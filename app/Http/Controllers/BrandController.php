<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    public function list()
    {
        $brands = Brand::where([
            ['deleted', '=', 0]
        ])->get();

        $page_title = 'Top Beauty Brands | Global Cosmetic Brands | Vaibhav stores';
		$meta_keyword = 'top beauty product brands, beauty products distributors';
        $meta_description = 'Enhance your beauty with the top beauty product brands. Vaibhav Store is an authorized dealer and distributor of quality and branded products in India.';
        $body_class = 'brand-list';
        return view('brands.list',compact('page_title','body_class', 'brands','meta_keyword','meta_description'));

    }

    public function detail($name)
    {
        $brand = Brand::where([
            ['slug', '=', $name],
            ['deleted', '=', 0]
        ])->first();
		
		$meta_keyword=$brand->meta_keyword;
		$meta_description=$brand->meta_description;
		$page_title=$brand->meta_title;
		
        //$page_title = 'Vaibhav - A Unit of 28 South Ventures';
        $body_class = 'brand-detail';
        return view('brands.detail',compact('page_title','body_class', 'brand','meta_keyword','meta_description'));

    }
}
