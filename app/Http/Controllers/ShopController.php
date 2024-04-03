<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function welcome(){
        $products = Product::paginate(10);
        return view('welcome', compact('products'));
    }

    public function productById($id){
        $product = Product::findOrFail($id);
        return view('productById', compact('product'));
    }

    public function cart(){
        $user_id = Auth::user()->id;
        $carts = Cart::where('user_id',$user_id)->get();

        $totalPrice = $carts->sum(function($cart){
            return $cart->price;
        });

        return view('cart', compact('carts','totalPrice'));
    }

    public function addToCart($id){
        $user_id = Auth::user()->id;

        $price = Product::where('id',$id)->pluck('price')->first();

        Cart::create([
            'user_id' => $user_id,
            'product_id' => $id,
            'price' => $price
        ]);

        return redirect(route('cart'));
    }

    public function deleteCart($id){
        Cart::destroy($id);
        return redirect(route('cart'));
    }

    public function deleteAllCart(){
        $user_id = Auth::user()->id;

        Cart::where('user_id',$user_id)->delete();
        return redirect(route('welcome'))->with('success','ordered successfully');
    }
}
