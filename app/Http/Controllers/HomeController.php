<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Quote;
use App\Models\Group;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ConfigController;



class HomeController extends ConfigController
{
    public function index(Request $request) {
        if(Auth::check() && Auth::user()->isAdmin()) {
            return view('home', [
                "quotesCount" => Quote::count(),
                "toverifQuotes" => Quote::unVerified()->get()->reverse(),
                "philoQuotes" => Quote::where('group', 'philo')->verified()->get()->reverse()->take(3),
                "lastQuotes" => Quote::all()->reverse()->take(3),
                "popularQuotes" => Quote::orderBy('views', 'desc')->get()->take(3),
                "dailyQuote" => Quote::daily()
            ]);
        } else {
            return view('home', [
                "quotesCount" => Quote::count(),
                "philoQuotes" => Quote::where('group', 'philo')->verified()->get()->reverse()->take(3),
                "lastQuotes" => Quote::all()->reverse()->take(3),
                "popularQuotes" => Quote::orderBy('views', 'desc')->get()->take(3),
                "dailyQuote" => Quote::daily()
            ]);
        }

    }
}
