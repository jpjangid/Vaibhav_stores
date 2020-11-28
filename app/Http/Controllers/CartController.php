<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;
class CartController extends Controller
{
    public function list()
    {
        $user = auth()->user();
        $cartItems = [];
        $cookieItems = [];
        $cookieCartItems = [];
        $totalCartItems = 0;
        if($user)
        {
            $cartItems = Cart::where('user_id',$user->id)->get();
            if($cartItems)
            {
                $totalCartItems = count($cartItems);
            }
        }
        else
        {
            if(request()->cookie('vaibhav_cart'))
            {
                $cookieItems = json_decode(request()->cookie('vaibhav_cart'));
                $totalCartItems = count($cookieItems);
                // dd($cookieItems);
                foreach ($cookieItems as $cookieItem)
                {
                    if($cookieItem->product_id){
                        $cookie_products = Product::with(['product_image_primary'])->where([
                            ['products.is_published', '=', 1],
                            ['products.id', '=', $cookieItem->product_id],
                            ['products.deleted', '=', 0]
                        ])->first();

                        $cookieCartItems[] = ['quantity'=>$cookieItem->quantity,'product'=>$cookie_products];
                    }
                }
            }

        }

        $page_title = 'Vaibhav - A Unit of 28 South Ventures';
        $body_class = 'cart';
		 $meta_keyword = '';
        $meta_description = '';
        return view('cart.list',compact('cartItems','cookieCartItems','totalCartItems','page_title','body_class','meta_keyword','meta_description'));
    }

    public function cartItemDelete(Request $request, $product_id)
    {
        $user = auth()->user();
        $cart = [];
        $minutes = 60;
        if($user)
        {
            Cart::where('user_id',$user->id)->where('product_id',$product_id)->delete();
        }
        else
        {
            if($request->hasCookie('vaibhav_cart'))
            {
                $cartItems = json_decode(request()->cookie('vaibhav_cart'));

                foreach($cartItems  as $cartItem)
                {
                    if($cartItem->product_id != $request->product_id)
                    {
                        $cart[]=['product_id'=>$cartItem->product_id,'quantity'=>$cartItem->quantity];
                    }
                }
            }
            if(empty($cart))
            {
                \Cookie::queue(\Cookie::forget('vaibhav_cart'));
            }
            else
            {
                $array_json=json_encode($cart);
                \Cookie::queue('vaibhav_cart', $array_json, $minutes);
            }
        }
        return redirect()->route('cart')
                            ->with('success','Item has been removed successfully.');
    }


}
