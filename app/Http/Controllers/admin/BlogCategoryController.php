<?php

namespace App\Http\Controllers\admin;

use App\BlogCategory;
use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\UserRightsAuth;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckAuth::class);
        $this->middleware(UserRightsAuth::class);
    }

    public function index()
    {
        $blogCategories = BlogCategory::where('deleted',0)->orderBy('name', 'asc')->paginate(5);

        return view('admin.blog-categories.index',compact('blogCategories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.blog-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(BlogCategory::rules(), BlogCategory::messages());

        BlogCategory::create($request->all());

        return redirect()->route('blog-categories.index')
                        ->with('success','Category created successfully.');
    }

    public function edit(BlogCategory $BlogCategory)
    {
        return view('admin.blog-categories.edit',compact('BlogCategory'));
    }

    public function update(Request $request, BlogCategory $BlogCategory)
    {
        $request->validate(BlogCategory::rules($BlogCategory->id), BlogCategory::messages());

        $BlogCategory->update($request->all());

        return redirect()->route('blog-categories.index')
                        ->with('success','Category updated successfully');
    }


    public function destroy($id)
    {
        $BlogCategory = BlogCategory::find($id);

        if ($BlogCategory) {
            $Blogs = $BlogCategory->Blogs;

            if (isset($Blogs) && count($Blogs)>0) {
                return redirect()->route('blog-categories.index')
                            ->with('fail','The blog-category is associated with blogs.');
            }
        }


        $BlogCategory->deleted = 1;
        $BlogCategory->save();

        return redirect()->route('blog-categories.index')
                            ->with('success','Blog-Category deleted successfully.');

    }



}
