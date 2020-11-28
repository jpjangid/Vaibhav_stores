<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\SubCategory;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\UserRightsAuth;
use File;

class SubCategoryController extends Controller
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
        $subcategories = SubCategory::where('deleted',0)->latest()->with('Category')->paginate(20);

        return view('admin.subcategories.index',compact('subcategories'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('deleted',0)->latest()->get();
        return view('admin.subcategories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(SubCategory::rules(), SubCategory::messages());

        if ($request->hasFile('image_add')) {
            $file = $request->image_add;
            $extension = $request->image_add->extension();
            $fileName = time().'.'.$extension;
            $path = $request->image_add->storeAs('subcategory', $fileName);
            $request->request->add(['image' => $fileName]);
        }

        SubCategory::create($request->all());

        return redirect()->route('sub-categories.index')
                        ->with('success','Sub Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::where('deleted',0)->latest()->get();

        return view('admin.subcategories.edit',compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $request->validate(SubCategory::rules($subCategory->id), SubCategory::messages());
        if($request->hasFile('image_add'))
        {
            $destinationPath = storage_path('app/public/subcategory');

            File::delete($destinationPath.'/'.$subCategory->image);  /// Unlink File
            $file = $request->image_add;
            $extension = $request->image_add->extension();
            $fileName = time().'.'.$extension;
            $path = $request->image_add->storeAs('subcategory', $fileName);
            $request->request->add(['image' => $fileName]);
        }
        $subCategory->update($request->all());

        return redirect()->route('sub-categories.index')
                        ->with('success','Sub Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        if(Product::where('deleted', 0)->where('sub_category_id',$subCategory->id)->doesntExist())
        {
            $subCategory->deleted = true;
            $subCategory->save();

            return redirect()->route('sub-categories.index')
                            ->with('success','Sub Category deleted successfully');
        }
        return redirect()->route('sub-categories.index')
                            ->with('success','Sub Category not deleted exist in porduct');
    }

    public function list(Request $request)
    {
        $subCategories = SubCategory::latest()->where('category_id', $request->category_id)->where('deleted', 0)->get();
        return view('admin.subcategories.list', compact('subCategories'));
    }
}
