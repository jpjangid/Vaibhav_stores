<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::latest()->paginate(5);
		
        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate(user::rules(), user::messages());

        User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('users.index')
                        ->with('success','user created successfully.');
    }

    public function show(user $user)
    {
        //
    }

    // public function edit(user $user)
    // {
    //     return view('users.edit',compact('user'));
    // }

    public function changePassword(Request $request)
    {
        $user = auth()->user();

        if ($request['password']) $update_data['password'] =  Hash::make($request['password']);
        $user = User::find($user->id);
        $user->update($update_data);
        return redirect()->route('users.profile')
                        ->with('success','user updated successfully');
    }

    public function destroy(user $user)
    {
        $user->deleted = true;
        $user->save();

        return redirect()->route('users.index')
                        ->with('success','user deleted successfully');
    }

    public function profile()
    {
        $user = auth()->user();

        $page_title = 'Vaibhav - A Unit of 28 South Ventures';
        $body_class = 'my_profile';
		 $meta_keyword = '';
        $meta_description = '';
        return view('users.profile', compact('user','page_title','body_class','meta_keyword','meta_description'));
    }
}
