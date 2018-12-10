<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Session;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index(){
        $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(4);//lấy giá trị có biến new trong db = 1
        // $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);//paginate phân trang của laravel
        $new_product1 = Product::where('promotion_price','<>',0)->paginate(8);
        // return View('page.trangchu',['slide' => $slide],['new_product'=>$new_product],['new_product' => $new_product1]);
        return view('page.trangchu',compact('slide','new_product','new_product1'));
    }
    public function loaisanpham($type){
        $sp_theoloai = Product::Where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id',$type)->first();//mỗi loại sp chỉ có 1 id không cần lấy hết
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function chitiet(Request $request){
        $sanpham = Product::where('id',$request->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
        return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }
    public function lienhe(){
        return view('page.lienhe');
    }
    //Giỏ Hàng
    public function AddtoCart(Request $request,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;//xem giỏ hàng có hàng k
        $cart = new Cart($oldCart);//khởi tạo giỏ hàng mới
        $cart->add($product,$id);//thêm phần tử vào giỏ hàng
        $request->session()->put('cart',$cart);
        return redirect()->route('users.index');
    }
    public function DelCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;//xem giỏ hàng
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items>0)){       
        Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getCheckout(){
        if(Session::has('cart')){
            $oldcart = Session::get('cart');
            $cart = new Cart($oldcart);//kiểm tra giỏ hàng có giỏ hàng mới chưa
            return view('page.dat_hang',['product_cart' => $cart->items,'totalPrice' => $cart->totalPrice,'totalQty'=>$cart->totalQty]);
        }
    }
    public function postCheckout(Request $request){
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $request->full_name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone;
        $customer->note = $request->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total =  $cart->totalPrice;
        $bill->payment = $request->payment_method;
        $bill->note = $request->notes;
        $bill->save();

        foreach($cart->items as $key =>$value){
        $bill_detail = new BillDetail;
        $bill_detail->id_bill = $bill->id;
        $bill_detail->id_product = $key;
        $bill_detail->quantity = $value['qty'];
        $bill_detail->unit_price = $value['price']/$value['qty'];
        $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->route('users.index');
    }
    public function Login(){
        return view('page.login');
    }
    public function SignUp(){
        return view('page.signup');
    }
    public function Store(Request $request)
    {
        // $this->validate;
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password'=> $request->password
        // ]);
        $user = new User;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->route('users.index');
    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $credentials = array('email'=>$req->email,'password'=>$req->password);
            if(Auth::attempt($credentials)){

            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }
        }
    public function Logout(){
        Auth::logout();
        return redirect()->route('users.index');
    }
    public function Search(Request $request){
        $product = Product::Where('name','like','%'.$request->search.'%')->get();
        return view('page.search',compact('product'));
    }
}
