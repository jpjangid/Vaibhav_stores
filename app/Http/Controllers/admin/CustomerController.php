<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserAddress;
use App\Order;
use App\OrderRow;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckAuth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckAuth::class);
    }

    public function index(Request $request)
    {
        $where_ar = [];

        if(isset($request->name)) {
            $where_ar[] = ['users.name','like','%'.$request->name.'%'];
        }
        $users = User::withCount('orders')->with(['order' => function ($query) {
            $query->orderBy('order_date', 'asc');
        }])->where($where_ar)->latest()->paginate(50);
        return view('admin.customers.index',compact('users', 'request'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function order(Request $request)
    {
        $where_ar = [];

        if(isset($request->id)) {
            $where_ar[] = ['user_id',$request->id];
        }
        if(isset($request->order_no)) {
            $where_ar[] = ['order_no',$request->order_no];
        }
        $orders = Order::withCount('OrderRows')->where($where_ar)->orderBy('order_date', 'asc')->paginate(50);

        return view('admin.customers.order', compact('orders','request'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function orderDetail($id)
    {
        $order = Order::where('id',$id)->with('OrderRows')->first();

        $page_title = 'Vaibhav - A Unit of 28 South Ventures';
        $body_class = 'order_view';
        return view('admin.customers.order_detail', compact('page_title','body_class','order'));
    }
}
