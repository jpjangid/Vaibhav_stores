<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Cart;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request  )
    { 
        $cart = [];
        $minutes = 60;
        $user = auth()->user();
        if($user)
        {
            $cartItems = Cart::where('user_id',$user->id)->get();
            if($request->hasCookie('vaibhav_cart'))
            {
                $cookieValues = json_decode($request->cookie('vaibhav_cart'));

                foreach($cookieValues  as $cookieValue)
                {
                    $cart[]=['product_id'=>$cookieValue->product_id,'quantity'=>$cookieValue->quantity];
                }

                \Cookie::queue(\Cookie::forget('vaibhav_cart'));

                foreach($cartItems  as $cartItem)
                {
                    foreach($cart  as $key => $cartValue)
                    {
                        if($cartValue['product_id'] == $cartItem->product_id)
                        {
                            /// Update data
                            Cart::where('id', $cartItem->id)
                            ->update(['quantity' =>  $cartItem->quantity+$cartValue['quantity']]);
                            unset($cart[$key]);
                        }
                    }
                }
                foreach($cart  as $key => $cartValue)
                {
                    $CartTable = new Cart;
                    $CartTable->product_id = $cartValue['product_id'];
                    $CartTable->user_id = $user->id;
                    $CartTable->quantity = $cartValue['quantity'];
                    $CartTable->save();
                }
            }
        }
    }
}
