<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\UserRight;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\UserRightsAuth;

class UserRightController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckAuth::class);
        $this->middleware(UserRightsAuth::class);
    }

    public function edit($id)
    {
        $admin = Admin::find($id)->load('userrights');
        return view('admin.user-rights.edit',compact('admin'));
    }

    public function update(Request $request, $id)
    {
        UserRight::where('admin_id',$id)->delete();
        $admin = Admin::find($id);
        $admin->userrights()->sync($request->input('modules', []));
        return redirect()->route('users.index')
                        ->with('success','User rights created successfully.');
    }

}
