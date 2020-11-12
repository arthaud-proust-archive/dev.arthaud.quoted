<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
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

        URL::defaults(['lang' => App::getLocale()]);
        // $url_array = explode('.', parse_url($request->url(), PHP_URL_HOST));
        // $langcode = $url_array[0];
        $languages = ['en','fr'];

        if(!$request->lang) {
            return redirect(App::getLocale());
        }

        if ( in_array($request->lang, $languages) ){
            App::setLocale($request->lang);
        } else {
            // dd();
            return redirect(str_replace($request->lang, App::getLocale(), \Request::getRequestUri()));
        }
        return $next($request);
    }
}