<?php

namespace App\Http\Controllers\admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\UserRightsAuth;
use File;
use Illuminate\Support\Str;

class BrandController extends Controller
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
        $brands = Brand::latest()->where('deleted',0)->paginate(5);

        return view('admin.brands.index',compact('brands'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Brand::rules(), Brand::messages());

        if ($request->hasFile('image_add')) {
            $file = $request->image_add;
            $extension = $request->image_add->extension();
            $fileNameString = (string) Str::uuid();
            $fileName = $fileNameString.time().'.'.$extension;
            $path = $request->image_add->storeAs('brand', $fileName);
            $request->request->add(['image' => $fileName]);
        }
        if ($request->hasFile('logo_add')) {
            $file = $request->logo_add;
            $extension = $request->logo_add->extension();
            $fileNameString = (string) Str::uuid();
            $fileName = $fileNameString.time().'.'.$extension;
            $path = $request->logo_add->storeAs('brand', $fileName);
            $request->request->add(['logo' => $fileName]);
        }
        
        Brand::create($request->all());

        return redirect()->route('brands.index')
                        ->with('success','Brand created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate(Brand::rules($brand->id), Brand::messages());
        $destinationPath = storage_path('app/public/category');

        if ($request->hasFile('image_add')) {
            File::delete($destinationPath.'/'.$brand->image);  /// Unlink File
            $file = $request->image_add;
            $extension = $request->image_add->extension();
            $fileNameString = (string) Str::uuid();
            $fileName = $fileNameString.time().'.'.$extension;
            $path = $request->image_add->storeAs('brand', $fileName);
            $request->request->add(['image' => $fileName]);
        }
        if ($request->hasFile('logo_add')) {
            File::delete($destinationPath.'/'.$brand->logo);  /// Unlink File
            $file = $request->logo_add;
            $extension = $request->logo_add->extension();
            $fileNameString = (string) Str::uuid();
            $fileName = $fileNameString.time().'.'.$extension;
            $path = $request->logo_add->storeAs('brand', $fileName);
            $request->request->add(['logo' => $fileName]);
        }
        
        $brand->update($request->all());

        return redirect()->route('brands.index')
                        ->with('success','Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
		//dd($brand);
		/* $affected = DB::table('Brand')
              ->where('id', 1)
              ->update(['votes' => 1]);
			   */
        //
		//echo"hello"; 
    }
}
