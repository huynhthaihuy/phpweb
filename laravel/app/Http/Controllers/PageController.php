<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
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
    public function gioithieu(){
        return view('page.gioithieu');
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
}
