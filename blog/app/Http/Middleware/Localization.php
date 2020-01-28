<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Request;

class Localization
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
        $language = $request->session()->get('locale');
        App::setLocale($language);
        return $next($request);
    }
}
