<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App;
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
        $url_array = explode('.', parse_url($request->url(), PHP_URL_HOST));
        $langcode = $url_array[0];
        $languages = ['en','fr'];
        if ( in_array($langcode, $languages) ){
            App::setLocale($langcode);
        }
        return $next($request);
    }
}