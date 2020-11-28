<?php

namespace App\Http\Middleware;

use App\Admin;
use App\UserRight;
use Closure;
use Illuminate\Support\Facades\Route;
class UserRightsAuth
{
    public function handle($request, Closure $next)
    {
        $admin_id = $request->session()->get('admin_id');
        if ($admin_id) {
            $action = app('request')->route()->getAction();
            $controller = class_basename($action['controller']);
            $allowed_pages = ['AdminController@showAdminLoginForm', 'AdminController@AdminLogin', 'AdminController@AdminLogout', 'AdminController@dashboard', 'CategoryController@list', 'SubCategoryController@list', 'BlogController@uploadImg','AdminController@forgottenPassword','AdminController@resetPassword','AdminController@changePassword','AdminController@updatePassword', 'EventController@uploadImg'];
            $allows = false;
            if (!in_array($controller,$request->session()->get('userrightPages')) && !in_array($controller,$allowed_pages)) {
                abort(403);
            }
        }

        return $next($request);
    }
}
