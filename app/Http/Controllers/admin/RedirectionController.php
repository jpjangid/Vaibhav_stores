<?php

namespace App\Http\Controllers\admin;

use App\Redirection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\UserRightsAuth;

class RedirectionController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckAuth::class);
        $this->middleware(UserRightsAuth::class);
    }

    public function index()
    {
        $redirections = Redirection::latest()->paginate(5);

        return view('admin.redirections.index',compact('redirections'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.redirections.create');
    }

    public function store(Request $request)
    {
        $request->validate(Redirection::rules(), Redirection::messages());

        Redirection::create($request->all());

        return redirect()->route('redirections.index')
                        ->with('success','Redirection rule created successfully.');
    }

    public function destroy(Redirection $Redirection)
    {
        $Redirection->delete();

        return redirect()->route('redirections.index')
                        ->with('success','Rule deleted successfully');
    }
}
