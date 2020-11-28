<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use App\Category;
use App\SubCategory;
use App\MetaData;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\UserRightsAuth;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckAuth::class);
        $this->middleware(UserRightsAuth::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('deleted',0)->orderBy('name', 'asc')->with('category','subCategory')->paginate(50);
        // dd($products);
        return view('admin.products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 50);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Product::rules(), Product::messages());
        $id = Product::create($request->all())->id;
        Review::create([
            'product_id' => $id,
            'rating' => rand(4,5)
        ]);
        return redirect()->route('products.edit', $id)
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $productImages = ProductImage::where('product_id',$product->id)->get();
        $categories = Category::where('deleted',0)->latest()->get();
        $subCategories = SubCategory::where('deleted',0)->where('category_id',$product->category_id)->latest()->get();
        $relatedProducts = Product::where('deleted',0)->where('is_published',1)->where('id', '!=', $product->id)->latest()->get();

        return view('admin.products.edit',compact('product','categories','subCategories', 'relatedProducts', 'productImages'));
    }

    public function productSequenceExist(Request $request, $sequence, $id)
    {
        $product = Product::where([
            ['sequence','=', $sequence],
            ['id','!=', $id],
            ['is_published', '=', 1],
            ['products.deleted', '=', 0]
        ])
        ->first();
        if($product)
        {
            $data = ['label'=>'Sequence number is exist.','name'=>$product->name,'url'=>route('products.edit',[$product->id])];
        }
        else
        {
            $data = ['label'=>'Not Exist','url'=>''];
        }

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $request->validate(Product::rules($product->id), Product::messages());
        $destinationPath = storage_path('app/public/product');
        if(isset($request->product_image_delete))
        {
            $product_image_delete_array = explode(',', $request->product_image_delete);
            $deleteProductImages = ProductImage::whereIn('id', $product_image_delete_array)->get();
            foreach($deleteProductImages as $deleteProductImage)
            {
                File::delete($destinationPath.'/'.$deleteProductImage->image);  /// Unlink File
                ProductImage::where('id', $deleteProductImage->id)->delete();
            }
        }
        if(isset($request->product_image))
        {
            //dd($request->product_image);
            foreach($request->product_image as $product_image)
            {
                if(isset($product_image['image']))
                {
                    if(isset($product_image['old_image']))
                    {
                        File::delete($destinationPath.'/'.$product_image['old_image']);  /// Unlink File
                    }

                    $file = $product_image['image'];
                    $extension = $product_image['image']->extension();
                    $fileNameString = (string) Str::uuid();
                    $fileName = $fileNameString.time().'.'.$extension;
                    $path = $product_image['image']->storeAs('product', $fileName);
                }
                else if(isset($product_image['old_image']))
                {
                    $fileName = $product_image['old_image'];
                }
                if(isset($product_image['primary']))
                {
                    $primary = $product_image['primary'];
                }
                else
                {
                    $primary = 0;
                }
                if(isset($product_image['product_image_id']))
                {
                    DB::table('product_images')
                            ->where('id', $product_image['product_image_id'])
                            ->update([
                                'image' => $fileName, 'is_primary' => $primary
                            ]);
                }
                else
                {
                    DB::table('product_images')->insert(
                        ['product_id' => $product->id, 'image' => $fileName, 'is_primary' => $primary]
                    );
                }

            }
        }

        if(isset($request->related_products))
        {
            $related_products = implode(',', $request->related_products);
            $request->request->add(['related_products' => $related_products]);
        }
        else
        {
            $request->request->add(['related_products' => '']);
        }
        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->deleted = true;
        $product->save();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }

    public function homepage()
    {
        $productFurnitures = Product::where([
            ['deleted', '=', 0],
            ['category_id','=', 1]
            ])->orderBy('name', 'asc')->get();

        $productConsumable = Product::where([
            ['deleted', '=', 0],
            ['category_id','=', 3]
            ])->orderBy('name', 'asc')->get();

        $productElectricals = Product::where([
            ['deleted', '=', 0],
            ['category_id','=', 2]
            ])->orderBy('name', 'asc')->get();

        $FurnitureProduct1 = MetaData::where('meta_key', 'FurnitureProduct1')->first();
        if ($FurnitureProduct1) $FurnitureProduct1 = $FurnitureProduct1->meta_value;
        else $FurnitureProduct1 = null;

        $FurnitureProduct2 = MetaData::where('meta_key', 'FurnitureProduct2')->first();
        if ($FurnitureProduct2) $FurnitureProduct2 = $FurnitureProduct2->meta_value;
        else $FurnitureProduct2 = null;

        $FurnitureProduct3 = MetaData::where('meta_key', 'FurnitureProduct3')->first();
        if ($FurnitureProduct3) $FurnitureProduct3 = $FurnitureProduct3->meta_value;
        else $FurnitureProduct3 = null;

        $FurnitureProduct4 = MetaData::where('meta_key', 'FurnitureProduct4')->first();
        if ($FurnitureProduct4) $FurnitureProduct4 = $FurnitureProduct4->meta_value;
        else $FurnitureProduct4 = null;

        $ConsumablesProduct = MetaData::where('meta_key', 'ConsumablesProduct')->first();
        if ($ConsumablesProduct) $ConsumablesProduct = $ConsumablesProduct->meta_value;
        else $ConsumablesProduct = null;

        $ElectricalsProduct1 = MetaData::where('meta_key', 'ElectricalsProduct1')->first();
        if ($ElectricalsProduct1) $ElectricalsProduct1 = $ElectricalsProduct1->meta_value;
        else $ElectricalsProduct1 = null;

        $ElectricalsProduct2 = MetaData::where('meta_key', 'ElectricalsProduct2')->first();
        if ($ElectricalsProduct2) $ElectricalsProduct2 = $ElectricalsProduct2->meta_value;
        else $ElectricalsProduct2 = null;

        $ElectricalsProduct3 = MetaData::where('meta_key', 'ElectricalsProduct3')->first();
        if ($ElectricalsProduct3) $ElectricalsProduct3 = $ElectricalsProduct3->meta_value;
        else $ElectricalsProduct3 = null;

        $ElectricalsProduct4 = MetaData::where('meta_key', 'ElectricalsProduct4')->first();
        if ($ElectricalsProduct4) $ElectricalsProduct4 = $ElectricalsProduct4->meta_value;
        else $ElectricalsProduct4 = null;

        return view('admin.products.homepage', compact('productFurnitures', 'productConsumable', 'productElectricals', 'FurnitureProduct1', 'FurnitureProduct2', 'FurnitureProduct3', 'FurnitureProduct4','ConsumablesProduct','ElectricalsProduct1','ElectricalsProduct2','ElectricalsProduct3','ElectricalsProduct4'));
    }

    public function saveHomepageFurnitureSection(Request $request)
    {
        $FurnitureProduct1 = $request->FurnitureProduct1;
        $FurnitureProduct2 = $request->FurnitureProduct2;
        $FurnitureProduct3 = $request->FurnitureProduct3;
        $FurnitureProduct4 = $request->FurnitureProduct4;

        if (!empty($FurnitureProduct1)) {
            MetaData::where('meta_key', 'FurnitureProduct1')->delete();

            $MetaData = new MetaData();
            $MetaData->meta_key = 'FurnitureProduct1';
            $MetaData->meta_value = $FurnitureProduct1;
            $MetaData->save();
        }

        if (!empty($FurnitureProduct2)) {
            MetaData::where('meta_key', 'FurnitureProduct2')->delete();

            $MetaData = new MetaData();
            $MetaData->meta_key = 'FurnitureProduct2';
            $MetaData->meta_value = $FurnitureProduct2;
            $MetaData->save();
        }

        if (!empty($FurnitureProduct3)) {
            MetaData::where('meta_key', 'FurnitureProduct3')->delete();

            $MetaData = new MetaData();
            $MetaData->meta_key = 'FurnitureProduct3';
            $MetaData->meta_value = $FurnitureProduct3;
            $MetaData->save();
        }

        if (!empty($FurnitureProduct4)) {
            MetaData::where('meta_key', 'FurnitureProduct4')->delete();

            $MetaData = new MetaData();
            $MetaData->meta_key = 'FurnitureProduct4';
            $MetaData->meta_value = $FurnitureProduct4;
            $MetaData->save();
        }



        return redirect()->route('homepage')
                        ->with('success','Home page content saved.');
    }

    public function saveHomepageConsumablesSection(Request $request)
    {
        $ConsumablesProduct = $request->ConsumablesProduct;


        if (!empty($ConsumablesProduct)) {
            MetaData::where('meta_key', 'ConsumablesProduct')->delete();

            $MetaData = new MetaData();
            $MetaData->meta_key = 'ConsumablesProduct';
            $MetaData->meta_value = $ConsumablesProduct;
            $MetaData->save();
        }


        return redirect()->route('homepage')
                        ->with('success','Home page content saved.');
    }

    public function saveHomepageElectricalsSection(Request $request)
    {
        $ElectricalsProduct1 = $request->ElectricalsProduct1;
        $ElectricalsProduct2 = $request->ElectricalsProduct2;
        $ElectricalsProduct3 = $request->ElectricalsProduct3;
        $ElectricalsProduct4 = $request->ElectricalsProduct4;

        if (!empty($ElectricalsProduct1)) {
            MetaData::where('meta_key', 'ElectricalsProduct1')->delete();

            $MetaData = new MetaData();
            $MetaData->meta_key = 'ElectricalsProduct1';
            $MetaData->meta_value = $ElectricalsProduct1;
            $MetaData->save();
        }

        if (!empty($ElectricalsProduct2)) {
            MetaData::where('meta_key', 'ElectricalsProduct2')->delete();

            $MetaData = new MetaData();
            $MetaData->meta_key = 'ElectricalsProduct2';
            $MetaData->meta_value = $ElectricalsProduct2;
            $MetaData->save();
        }

        if (!empty($ElectricalsProduct3)) {
            MetaData::where('meta_key', 'ElectricalsProduct3')->delete();

            $MetaData = new MetaData();
            $MetaData->meta_key = 'ElectricalsProduct3';
            $MetaData->meta_value = $ElectricalsProduct3;
            $MetaData->save();
        }

        if (!empty($ElectricalsProduct4)) {
            MetaData::where('meta_key', 'ElectricalsProduct4')->delete();

            $MetaData = new MetaData();
            $MetaData->meta_key = 'ElectricalsProduct4';
            $MetaData->meta_value = $ElectricalsProduct4;
            $MetaData->save();
        }



        return redirect()->route('homepage')
                        ->with('success','Home page content saved.');
    }
}
