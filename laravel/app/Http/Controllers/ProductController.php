<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductType;
use Hash;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //lay ra 2 du lieu
        //$posts = Post::with('category')->take(2)->get();
        // $users = DB::table('users')->get();
        $products = Product::all();
        return view('Product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::all();
        $product_types = ProductType::all();
        return view('Product.create',['product_types' => $product_types],['products' =>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password'=> $request->password
        // ]);
        // dd($request->ct_id);
        // dd($request->all());
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);      
        $products = new Product;
        $products->name = $request->name;
        $products->id_type = $request->id_type;
        $products->description = $request->description;
        $products->unit_price = $request->unit_price;
        $products->promotion_price=$request->promotion_price;
        $products->image = $request->image;
        $products->unit = $request->unit;
        $products->new = $request->new;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/source/image/product');
            $image->move('source/image/product','file.jpg');
       }
        $products->save();
    //     $products = Product::create([
    //     'name' => $request->name,
    //     'id_type' => $request->id_type,
    //     'description' => $request->description,
    //     'unit_price' => $request->unit_price,
    //     'promotion_price'=>$request->promotion_price,
    //     'image' => $request->file->image,
    //     'unit' => $request->unit,
    //     'new' => $request->new,
    //    ]);
     $products->product_type()->attach($request->product_type);
       return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::with('product_type')->find($id);
        //  dd($products);
        // dd($product_type);
        return view('Product.show', ['product' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $products = Product::with('product_type')->find($id);
        return view('Product.edit', ['product' => $products]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request->all());
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->new = $request->new;
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::with('product_type')->find($id)->delete();
        // dd($user);
        return redirect()->route('products.index');
    }
}