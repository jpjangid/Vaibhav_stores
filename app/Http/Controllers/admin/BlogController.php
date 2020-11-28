<?php

namespace App\Http\Controllers\admin;

use App\Blog;
use App\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\UserRightsAuth;
use File;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckAuth::class);
        $this->middleware(UserRightsAuth::class);
    }

    public function index()
    {
        $blogs = Blog::latest()->paginate(5);

        return view('admin.blogs.index',compact('blogs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        // $request->validate(Blog::rules(), Blog::messages());

        $blog = Blog::create($request->all());

        return redirect()->route('blogs.edit', $blog->id)
                        ->with('success','Category created successfully.');
    }

    public function edit(Blog $Blog)
    {

        $BlogCategories = BlogCategory::where('deleted',0)->orderBy('name','asc')->get();


        return view('admin.blogs.edit',compact('Blog', 'BlogCategories'));
    }

    public function update(Request $request, Blog $Blog)
    {
        $request->validate(Blog::rules($Blog->id), Blog::messages());

        $oldImg = storage_path('app/public/blog/'.$Blog->id.'/'.$Blog->getOriginal()['featured_image']);

        if($request->hasFile('f_image'))
        {

            if (file_exists($oldImg)) File::delete($oldImg);

            $file = $request->f_image;
            $extension = $request->f_image->extension();
            $fileName = 'featured-image'.'.'.$extension;
            $path = $request->f_image->storeAs('blog/'.$Blog->id, $fileName);
            $request->request->add(['featured_image' => $fileName]);
        }
        else
        {
            if (!file_exists($oldImg))
            {
                $request->request->add(['featured_image' => null]);
            }
        }



        $Blog->update($request->all());
        $Blog->BlogCategories()->sync($request->blog_category_ids);

        return redirect()->route('blogs.index')
                        ->with('success','Category updated successfully');
    }

    public function uploadImg(Request $request) {

        $file = $request->blogImg;
        $extension = $request->blogImg->extension();
        $fileName = time().'.'.$extension;
        if ($request->blogImg->storeAs('blog/'.$request->blog_id, $fileName)) {
            $url = '/storage/blog/'.$request->blog_id.'/'.$fileName;
            $data = ['status' => 'success', 'url' => $url];
        } else {
            $data = ['status' => 'fail'];
        }


        echo json_encode($data);
    }
}
