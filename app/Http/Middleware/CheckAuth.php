<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $admin_id = $request->session()->get('admin_id');

        $page = class_basename(Route::currentRouteAction());

        $allowed_pages = ['AdminController@showAdminLoginForm', 'AdminController@AdminLogin','AdminController@forgottenPassword','AdminController@resetPassword'];

        if (!$admin_id) {
            if (!in_array($page, $allowed_pages)) {
                return redirect()->route('showAdminLoginForm');
            }
        }

        return $next($request);
    }
}
