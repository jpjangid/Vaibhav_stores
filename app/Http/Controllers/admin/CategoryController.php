<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\UserRightsAuth;
use File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(CheckAuth::class);
        $this->middleware(UserRightsAuth::class);
    }

    public function index()
    {
        $categories = Category::latest()->where('deleted',0)->paginate(5);

        return view('admin.categories.index',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Category::rules(), Category::messages());

        if ($request->hasFile('image_add')) {
            $file = $request->image_add;
            $extension = $request->image_add->extension();
            $fileNameString = (string) Str::uuid();
            $fileName = $fileNameString.time().'.'.$extension;
            $path = $request->image_add->storeAs('category', $fileName);
            $request->request->add(['image' => $fileName]);
        }
        if ($request->hasFile('banner_image_mobile_add')) {
            $file = $request->banner_image_mobile_add;
            $extension = $request->banner_image_mobile_add->extension();
            $fileNameString = (string) Str::uuid();
            $fileName = $fileNameString.time().'.'.$extension;
            $path = $request->banner_image_mobile_add->storeAs('category', $fileName);
            $request->request->add(['banner_image_mobile' => $fileName]);
        }
        if ($request->hasFile('banner_image_desktop_add')) {
            $file = $request->banner_image_desktop_add;
            $extension = $request->banner_image_desktop_add->extension();
            $fileNameString = (string) Str::uuid();
            $fileName = $fileNameString.time().'.'.$extension;
            $path = $request->banner_image_desktop_add->storeAs('category', $fileName);
            $request->request->add(['banner_image_desktop' => $fileName]);
        }
        Category::create($request->all());

        return redirect()->route('categories.index')
                        ->with('success','Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(Category::rules($category->id), Category::messages());
        $destinationPath = storage_path('app/public/category');
        if($request->hasFile('image_add'))
        {
            File::delete($destinationPath.'/'.$category->image);  /// Unlink File
            $file = $request->image_add;
            $extension = $request->image_add->extension();
            $fileNameString = (string) Str::uuid();
            $fileName = $fileNameString.time().'.'.$extension;
            $path = $request->image_add->storeAs('category', $fileName);
            $request->request->add(['image' => $fileName]);
        }
        if ($request->hasFile('banner_image_mobile_add')) {
            File::delete($destinationPath.'/'.$category->banner_image_mobile);  /// Unlink File
            $file = $request->banner_image_mobile_add;
            $extension = $request->banner_image_mobile_add->extension();
            $fileNameString = (string) Str::uuid();
            $fileName = $fileNameString.time().'.'.$extension;
            $path = $request->banner_image_mobile_add->storeAs('category', $fileName);
            $request->request->add(['banner_image_mobile' => $fileName]);
        }
        if ($request->hasFile('banner_image_desktop_add')) {
            File::delete($destinationPath.'/'.$category->banner_image_desktop);  /// Unlink File
            $file = $request->banner_image_desktop_add;
            $extension = $request->banner_image_desktop_add->extension();
            $fileNameString = (string) Str::uuid();
            $fileName = $fileNameString.time().'.'.$extension;
            $path = $request->banner_image_desktop_add->storeAs('category', $fileName);
            $request->request->add(['banner_image_desktop' => $fileName]);
        }

        $category->update($request->all());

        return redirect()->route('categories.index')
                        ->with('success','Category updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(SubCategory::where('deleted', 0)->where('category_id',$category->id)->doesntExist())
        {
            $category->deleted = true;
            $category->save();

            return redirect()->route('categories.index')
                            ->with('success','Category deleted successfully');
        }
        return redirect()->route('categories.index')
                            ->with('success','Category not deleted, exist in sub categories');
    }

    public static function list()
    {
        return $categories = Category::where('deleted',0)->latest()->get();
    }
}
