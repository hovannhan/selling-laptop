<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Category;
use App\Product;

class CartController extends Controller
{
    public function __construct(){
        $categories = Category::all();
        view()->share('categories',$categories);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$carts = Cart::content();
    	if(isset($carts)){
    		foreach ($carts as $key => $value) {
    			$product = Product::find($value->id);
    		}
	        return view('pages.cartShop',compact(['carts','product']));
    	}
    	return "sai";
    }
    public function addCart($id)
    {
        $product = Product::find($id);
        if (isset($product)) {
            Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price,'options' => ['images' => $product->images]]);
            $carts = Cart::content();
            return view('pages.cartShop',compact(['carts','product']));
        }
        
        return redirect()->route('index');
    }
    public function cartDestroy(){
    	Cart::destroy();
    	return redirect()->route('cart_add');
    }

}
