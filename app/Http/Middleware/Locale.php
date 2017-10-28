<?php

namespace App\Http\Middleware;

use Closure;

class Locale
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
        $locale = request()->segment(1);
        $languages = config('app.locales');

        if (in_array($locale, $languages)) {
            app()->setLocale($locale);
        } else {
            //dd(request());
        }

        return $next($request);
    }
}
