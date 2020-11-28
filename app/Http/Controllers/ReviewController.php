<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Review;
use App\OrderRow;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function feedback($product_id, $order_row_id)
    {
        $product = Product::where('id',$product_id)->first();


        $page_title = $product->meta_title;
        $body_class = 'product_review';
		 $meta_keyword =$product->meta_keyword;
         $meta_description =$product->meta_description;
		
        return view('reviews.feedback', compact('page_title','body_class','product', 'order_row_id','meta_keyword','meta_description'));
    }

    public function saveReview(Request $request)
    {
        $user = auth()->user();

        Review::create([
            'product_id' => $request['product_id'],
            'user_id' => $user->id,
            'rating' => $request['stars'],
            'review' => $request['review'],
        ]);

        OrderRow::where('id', $request['order_row_id'])->update(['is_reviewed' => true]);

        return redirect()->route('orders.list')
                        ->with('success','Rating & Review saved successfully.');
    }

}
