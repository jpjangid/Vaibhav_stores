<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Cart;
use App\Review;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function productSearch($searchQuery)
    {

        if($searchQuery != 'viewAll')
        {
            $products = Product::where([
                ['slug','LIKE','%'.$searchQuery.'%'],
                ['is_published', '=', 1],
                ['deleted', '=', 0]
            ])->paginate(5);
        }
        else
        {
            $products = Product::where([
                ['is_published', '=', 1],
                ['deleted', '=', 0]
            ])->paginate(5);
        }
		
        $page_title = 'Vaibhav - A Unit of 28 South Ventures';
		$meta_keyword = '';
        $meta_description = '';
        $body_class = 'product-search';
        return view('products.search',compact('products','page_title','body_class','meta_keyword','meta_description'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function categoryList($category_slug)
    {
        $category = Category::where([
            ['slug', '=', $category_slug],
            ['deleted', '=', 0]
        ])->with('subcategory_available_orderBy')->first();
        if(!$category){
            abort(404);
        }
        $template_type = $category->template_type;

        //$page_title = 'Vaibhav - A Unit of 28 South Ventures';
        $body_class = 'product-list category-list';
        $page_title = $category->meta_title;
        $meta_keyword = $category->meta_keyword;
        $meta_description = $category->meta_description;

        return view('products.category-list',compact('category','page_title','body_class','template_type','meta_keyword','meta_description'));
    }

    public function list($category_slug,$sub_category_slug)
    {
        $category = Category::where([
            ['slug', '=', $category_slug],
            ['deleted', '=', 0]
        ])->with('subcategory_available_orderBy')->first();
        if(!$category){
            abort(404);
        }

        $subCategoryData = SubCategory::where([
            ['slug','=',$sub_category_slug],
            ['deleted', '=', 0]
        ])->first();
        if(!$subCategoryData){
            abort(404);
        }
        $products = Product::with('product_image_primary')
        ->where([
            ['sub_category_id','=',$subCategoryData->id],
            ['is_published', '=', 1],
            ['products.deleted', '=', 0]
        ])
        ->orderBy('sequence', 'asc')
        ->get();
		
		$page_title = $subCategoryData->meta_title;
        $meta_keyword = $subCategoryData->meta_keyword;
        $meta_description = $subCategoryData->meta_description;
        //$page_title = 'Vaibhav - A Unit of 28 South Ventures';
        $body_class = 'product-list product-list-'.$category->template_type;
        return view('products.'.$category->template_type,compact('category','subCategoryData','products','page_title','body_class','meta_keyword','meta_description'));
    }

    public function productDetail($category_slug,$sub_category_slug,$product_slug)
    {
        $product = Product::with(['productImages'])->where([
            ['is_published', '=', 1],
            ['products.deleted', '=', 0],
            ['products.slug', '=', $product_slug]
        ])
        ->first();

        if(!$product)
        {
            abort(404);
        }
        $add_related_product_ids = [];
        $related_product_ids=explode(',',$product->related_products);
        if(empty($product->related_products))
        {
            $add_related_product_ids[] = $product->id;
            $productSub1 = Product::where([
                ['is_published', '=', 1],
                ['products.deleted', '=', 0],
                ['products.sub_category_id', '=', $product->sub_category_id],
            ])
            ->whereNotIn('products.id', $add_related_product_ids)
            ->first();
            if($productSub1)
            {
                $add_related_product_ids[] = $productSub1->id;
                $related_product_ids[] = $productSub1->id;
                $productSub2 = Product::where([
                    ['is_published', '=', 1],
                    ['products.deleted', '=', 0],
                    ['products.sub_category_id', '=', $product->sub_category_id],
                ])
                ->whereNotIn('products.id', $add_related_product_ids)
                ->first();
                if($productSub2)
                {
                    $add_related_product_ids[] = $productSub2->id;
                    $related_product_ids[] = $productSub2->id;
                }
            }

            $productcat1 = Product::where([
                ['is_published', '=', 1],
                ['products.deleted', '=', 0],
                ['products.category_id', '=', $product->category_id]
            ])
            ->whereNotIn('products.id', $add_related_product_ids)
            ->first();
            if($productcat1)
            {
                $add_related_product_ids[] = $productcat1->id;
                $related_product_ids[] = $productcat1->id;
                $productcat2 = Product::where([
                    ['is_published', '=', 1],
                    ['products.deleted', '=', 0],
                    ['products.category_id', '=', $product->category_id],
                ])
                ->whereNotIn('products.id', $add_related_product_ids)
                ->first();
                if($productcat2)
                {
                    $related_product_ids[] = $productcat2->id;
                }
            }


        }
        $related_products = Product::with(['product_image_primary'])
        ->where([
            ['products.is_published', '=', 1],
            ['products.deleted', '=', 0],
        ])
        ->whereIn('id', $related_product_ids)
        ->get();

        // $productReviews = Review::with('user')
        // ->where('product_id',$product->id)
        // ->orderBy('rating', 'desc')
        // ->paginate(5);

        // $totalReviews = Review::where('product_id',$product->id)->count();

        // $rating5 = Review::where([
        //     ['product_id', $product->id],
        //     ['rating', 5]
        // ])->count();

        // $rating4 = Review::where([
        //     ['product_id', $product->id],
        //     ['rating', 4]
        // ])->count();

        // $rating3 = Review::where([
        //     ['product_id', $product->id],
        //     ['rating', 3]
        // ])->count();

        // $rating2 = Review::where([
        //     ['product_id', $product->id],
        //     ['rating', 2]
        // ])->count();

        // $rating1 = Review::where([
        //     ['product_id', $product->id],
        //     ['rating', 1]
        // ])->count();

        // $ratings = Review::where('product_id',$product->id)->avg('rating');
//dd($category_slug);
        if (strpos($category_slug, 'electrical') === FALSE) {
            if($category_slug=="consumable"){
                 $enquiry_type = 'consumable'; 
            }else{
                 $enquiry_type = 'furniture'; 
            }
          

         }
         else{
            
			 $enquiry_type = 'electrical';

         }
        $page_title = $product->meta_title;
        $meta_keyword = $product->meta_keyword;
        $meta_description = $product->meta_description;
        $body_class = 'product-detail';
        return view('products.product-detail',compact('product','page_title','body_class','related_products','enquiry_type','meta_keyword','meta_description'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function addTocart(Request $request)
    {
        $cart = [];
        $minutes = 60*24*30;
        $user = auth()->user();
        $existCookie = false;
        if($user)
        {
            $cartItems = Cart::where('user_id',$user->id)->where('product_id',$request->product_id)->first();
            if($cartItems)
            {
                //update data
                Cart::where('id', $cartItems->id)
                        ->update(['quantity' =>  $cartItems->quantity+1]);
            }
            else
            {
                /// Insert data
                $CartTable = new Cart;
                $CartTable->product_id = $request->product_id;
                $CartTable->user_id = $user->id;
                $CartTable->quantity = 1;
                $CartTable->save();
            }
        }
        else
        {
            if($request->hasCookie('vaibhav_cart'))
            {
                $cartItems = json_decode(request()->cookie('vaibhav_cart'));

                foreach($cartItems  as $cartItem)
                {
                    if($cartItem->product_id == $request->product_id)
                    {
                        $cartItem->quantity += 1;
                        $existCookie = true;
                    }
                    $cart[]=['product_id'=>$cartItem->product_id,'quantity'=>$cartItem->quantity];
                }
                if(!$existCookie)
                {
                    $cart[]=['product_id'=>$request->product_id,'quantity'=>1];
                }
            }
            else
            {
                $cart[]=['product_id'=>$request->product_id,'quantity'=>1];
            }
            $array_json=json_encode($cart);
            \Cookie::queue('vaibhav_cart', $array_json, $minutes);
        }

        // return response(['success'=>'Item added into cart successfully.', 'totalCartItem'=>$totalCartItem]);
        return response('Item added into cart successfully.');
        // return redirect()->route('cart')
        //                 ->with('success','Item added into cart successfully.');
    }

    public function getCookie(Request $request)
    {
        $totalCartItem = app('App\Http\Controllers\HomeController')->cartItem();
        return response($totalCartItem);
        // return $cookieValues = json_decode($request->cookie('vaibhav_cart'));
    }

}
