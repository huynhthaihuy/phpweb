<?php

namespace App\Providers;
use App\ProductType;
use App\Cart;
use Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('header',function($view){
            $loai_sp = ProductType::all();
    
            $view->with('loai_sp',$loai_sp);
        });
        view()->composer(['header','page.dat_hang'],function($view){
            if(Session('cart')){
                $oldcart = Session::get('cart');
                $cart = new Cart($oldcart);//kiểm tra giỏ hàng có giỏ hàng mới chưa
                $view->with(['cart' => Session::get('cart'),'product_cart'=>$cart->items,'totalrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
