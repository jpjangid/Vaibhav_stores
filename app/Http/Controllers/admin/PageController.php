<?php

namespace App\Http\Controllers\admin;

use App\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\UserRightsAuth;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckAuth::class);
        $this->middleware(UserRightsAuth::class);
    }

    public function index()
    {
        $pages = Page::latest()->paginate(50);

        return view('admin.pages.index',compact('pages'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate(Page::rules(), Page::messages());

        $page = Page::create($request->all());

        return redirect()->route('pages.edit', $page->id)
                        ->with('success','Page created successfully.');
    }

    public function edit(Page $Page)
    {
        return view('admin.pages.edit',compact('Page'));
    }

    public function update(Request $request, Page $Page)
    {
        $request->validate(Page::rules($Page->id), Page::messages());
        $Page->update($request->all());
        return redirect()->route('pages.index')
                        ->with('success','Page updated successfully');
    }

    public function uploadImg(Request $request) {

        $file = $request->pageImg;
        $extension = $request->pageImg->extension();
        $fileName = time().'.'.$extension;
        if ($request->pageImg->storeAs('page/'.$request->page_id, $fileName)) {
            $url = '/storage/page/'.$request->page_id.'/'.$fileName;
            $data = ['status' => 'success', 'url' => $url];
        } else {
            $data = ['status' => 'fail'];
        }


        echo json_encode($data);
    }
}
