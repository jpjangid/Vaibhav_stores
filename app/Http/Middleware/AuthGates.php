<?php

namespace App\Http\Middleware;

use App\Admin;
use App\Permission;
use Closure;
use Illuminate\Support\Facades\Gate;
class AuthGates
{
    public function handle($request, Closure $next)
    {
        // config(['auth.defaults.guard' => 'admins']);
        $admin_id = $request->session()->get('admin_id');

        if (!app()->runningInConsole() && $admin_id) {
            $admin = Admin::find($admin_id);
            $permissions = Permission::all();
            $admin->load('permissions');

            foreach ($admin->permissions as $permissions) {
                $permissionsArray[$permissions->title][] = $admin->id;
            }
            // dd($permissionsArray);

            // foreach ($admin->permissions as $permission) {
            //     dd(Gate::define($permission->title, 'true'));
            //     Gate::define($permission->title, 'true');
            // }
            foreach ($permissionsArray as $title => $admins) {
                // dd( Gate::define($title, function (\App\Admin $admin) use ($admins) {
                //     return count(array_intersect($admin->pluck('id')->toArray(), $admins)) > 0;
                // }));
                // $aa = Admin::pluck('id')->toArray();
                // dd(count(array_intersect($aa, $admins)) > 0);
                // dd($aa);
                Gate::define($title, function (\App\Admin $admin) use ($admins) {
                    //dd($admin->pluck('id'));
                    return count(array_intersect($admin->pluck('id')->toArray(), $admins)) > 0;
                });
            }
        }

        return $next($request);
    }
}
