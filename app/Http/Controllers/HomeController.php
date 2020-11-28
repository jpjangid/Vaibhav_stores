<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Product;
use App\Enquiry;
use App\Cart;
use App\Page;
use App\Brand;
use App\MetaData;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('home','mail','cartItem','headerCategories','advanceSearch', 'page');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $FurnitureProductMeta1 = MetaData::where('meta_key', 'FurnitureProduct1')->first();
        $FurnitureProductMeta1 = $FurnitureProductMeta1->meta_value;
        $furnitureProduct1 = Product::where([
            ['id','=',$FurnitureProductMeta1],
            ['is_published', '=', 1],
            ['products.deleted', '=', 0]
        ])->with('subCategory.category')->first();

        $FurnitureProductMeta2 = MetaData::where('meta_key', 'FurnitureProduct2')->first();
        $FurnitureProductMeta2 = $FurnitureProductMeta2->meta_value;
        $furnitureProduct2 = Product::where([
                                ['id','=',$FurnitureProductMeta2],
                                ['is_published', '=', 1],
                                ['products.deleted', '=', 0]
                            ])->with('subCategory.category')->first();


        $FurnitureProductMeta3 = MetaData::where('meta_key', 'FurnitureProduct3')->first();
        $FurnitureProductMeta3 = $FurnitureProductMeta3->meta_value;
        $furnitureProduct3 = Product::where([
                                ['id','=',$FurnitureProductMeta3],
                                ['is_published', '=', 1],
                                ['products.deleted', '=', 0]
                            ])->with('subCategory.category')->first();

        $FurnitureProductMeta4 = MetaData::where('meta_key', 'FurnitureProduct4')->first();
        $FurnitureProductMeta4 = $FurnitureProductMeta4->meta_value;
        $furnitureProduct4 = Product::where([
                                ['id','=',$FurnitureProductMeta4],
                                ['is_published', '=', 1],
                                ['products.deleted', '=', 0]
                            ])->with('subCategory.category')->first();

        $ConsumablesProductMeta = MetaData::where('meta_key', 'ConsumablesProduct')->first();
        $ConsumablesProductMeta = $ConsumablesProductMeta->meta_value;

        $consumablesProduct = Product::where([
                                    ['id','=',$ConsumablesProductMeta],
                                    ['is_published', '=', 1],
                                    ['products.deleted', '=', 0]
                                ])->with('subCategory.category')->first();

        $ElectricalsProductMeta1 = MetaData::where('meta_key', 'ElectricalsProduct1')->first();
        $ElectricalsProductMeta1 = $ElectricalsProductMeta1->meta_value;
        $electricalsProduct1 = Product::where([
                    ['id','=',$ElectricalsProductMeta1],
                    ['is_published', '=', 1],
                    ['products.deleted', '=', 0]
                ])->with('subCategory.category')->first();

        $ElectricalsProductMeta2 = MetaData::where('meta_key', 'ElectricalsProduct2')->first();
        $ElectricalsProductMeta2 = $ElectricalsProductMeta2->meta_value;
        $electricalsProduct2 = Product::where([
                    ['id','=',$ElectricalsProductMeta2],
                    ['is_published', '=', 1],
                    ['products.deleted', '=', 0]
                ])->with('subCategory.category')->first();

        $ElectricalsProductMeta3 = MetaData::where('meta_key', 'ElectricalsProduct3')->first();
        $ElectricalsProductMeta3 = $ElectricalsProductMeta3->meta_value;
        $electricalsProduct3 = Product::where([
                    ['id','=',$ElectricalsProductMeta3],
                    ['is_published', '=', 1],
                    ['products.deleted', '=', 0]
                ])->with('subCategory.category')->first();

        $ElectricalsProductMeta4 = MetaData::where('meta_key', 'ElectricalsProduct4')->first();
        $ElectricalsProductMeta4 = $ElectricalsProductMeta4->meta_value;

        $electricalsProduct4 = Product::where([
                                    ['id','=',$ElectricalsProductMeta4],
                                    ['is_published', '=', 1],
                                    ['products.deleted', '=', 0]
                                ])->with('subCategory.category')->first();

        $brands = Brand::where([
                                    ['show_on_home_page','=',1],
                                    ['brands.deleted', '=', 0]
                                ])->get();

        $page_title = 'Buy Beauty Salon Products & Equipments Wholesale | Vaibhav Stores';
        $meta_keyword = 'beauty salon products, salon equipments , salon furniture';
        $meta_description = 'Get the best quality spa furniture, beauty salon products, salon equipment at best prices. Get your makeover done with genuine and trustworthy products!!';
        $body_class = 'home';
  
        return view('home', compact('furnitureProduct1','furnitureProduct2','furnitureProduct3','furnitureProduct4','consumablesProduct','electricalsProduct1','electricalsProduct2','electricalsProduct3','electricalsProduct4','page_title','meta_keyword','meta_description','body_class', 'brands'));
    }

    public function mail()
    {
       $name = 'Krunal';
       Mail::to('abhilashlohar01@gmail.com')->send(new SendMailable($name));

       return 'Email was sent';
    }

    public static function cartItem()
    {
        $totalItemCart = 0 ;
        $user = auth()->user();

        if($user)
        {
            $cartItems = Cart::where('user_id',$user->id)->get();
            foreach($cartItems as $cartItem)
            {
                $totalItemCart += $cartItem->quantity;
            }
        }
        else
        {
            $cartItems = json_decode(request()->cookie('vaibhav_cart'));
            if($cartItems)
            {
                foreach($cartItems as $cartItem)
                {
                    $totalItemCart += $cartItem->quantity;
                }
            }


        }
        return $totalItemCart;
    }

    public static function headerCategories()
    {
        $headerCategories = Category::with('subCategoryFirst')
        ->where([
            ['deleted', '=', 0]
        ])
        ->whereHas('subCategoryFirst')
        ->orderBy('sequence', 'asc')
        ->get();
        return $headerCategories;
    }

    public function advanceSearch(Request $request, $search)
    {
        // $products = Product::where([
        //     ['name','like','%'.$search.'%'],
        //     ['is_published', '=', 1],
        //     ['products.deleted', '=', 0]
        // ])
        // ->with(['category','category.subCategoryFirst','subCategory'])
        // ->orderBy('category_id', 'asc')
        // ->get();
        $products = DB::select("
        	SELECT pd.name, pd.slug, pd.category_id, pd.sub_category_id, cat.slug as category_slug, subcat.slug as sub_category_slug, cat.name as category_name, subcat.name as subcategory_name, (SELECT COUNT(*) FROM products WHERE category_id = cat.id AND name LIKE '%".$search."%' AND is_published=1 AND deleted=0 group by category_id) AS category_count, (SELECT COUNT(*) FROM products WHERE sub_category_id = subcat.id AND name LIKE '%".$search."%' AND is_published=1 AND deleted=0 group by sub_category_id) AS sub_category_count  FROM products pd
        	INNER JOIN categories cat ON cat.id=pd.category_id
        	INNER JOIN sub_categories subcat ON subcat.id=pd.sub_category_id
        	WHERE pd.name LIKE '%".$search."%' AND pd.is_published=1 AND pd.deleted=0 
        	ORDER BY pd.category_id ASC,pd.sub_category_id ASC
        	");
        $category_exist = [];
        $subcategory_exist = [];
        // dd($products);
        $data = [];
        foreach($products as $product)
        {
            if(!in_array($product->category_id,$category_exist))
            {
                $data [] = ['label'=>$product->category_name.' ('.$product->category_count.')','url'=>route('products.category-list',[$product->category_slug]),'category'=>'yes','subcategory'=>''];
                $category_exist[] = $product->category_id;
            }
            if(!in_array($product->sub_category_id,$subcategory_exist))
            {
                $data [] = ['label'=>$product->subcategory_name.' ('.$product->sub_category_count.')','url'=>route('products.list',[$product->category_slug,$product->sub_category_slug]),'category'=>'','subcategory'=>'yes'];
                $subcategory_exist[] = $product->sub_category_id;
            }

            $data [] = ['label'=>$product->name,'url'=>route('products.product-detail',[$product->category_slug,$product->sub_category_slug,$product->slug]),'category'=>'','subcategory'=>''];

        }
        return response()->json($data);
    }

    public function page($slug)
    {
        $page = Page::where([
                    ['slug', '=', $slug],
                    ['status', '=', 'published']
                ])->first();

        if (empty($page)) {
            $page_title = 'Vaibhav - A Unit of 28 South Ventures';
			$meta_keyword ='';
            $meta_description ='';
            $body_class = 'page_not_found';
            return view('404', compact('page_title','body_class'));
        }
		$meta_keyword =  $page->meta_keyword;
        $meta_description = $page->meta_description;
        $page_title = $page->meta_title;
        $body_class = $slug;
        return view('page', compact('page_title','body_class','page','meta_description','meta_keyword'));
    }
}
