<?php

namespace App\Http\Middleware;

use Closure;
use App\Redirection;
use Illuminate\Support\Facades\Route;

class CheckRedirect
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
        $requested_url = $request->fullUrl();

        $RulePages = Redirection::all();

        $redirectRules = [];

        if ($RulePages) {
            foreach ($RulePages as $RulePage) {
                $redirectRules[$RulePage->from_url] = $RulePage->to_url;
            }
        }


        if (isset($redirectRules[$requested_url])) {
            return redirect($redirectRules[$requested_url]);
        }
        
        return $next($request);
    }
}
