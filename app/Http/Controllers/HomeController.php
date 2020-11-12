<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Quote;
use App\Models\Group;
use Validator;



class HomeController extends Controller
{
    public function index(Request $request) {
        return view('home', [
            "lastQuotes" => Quote::all()->reverse()->take(3),
            "popularQuotes" => Quote::orderBy('views', 'desc')->get()->take(3)
        ]);
    }
}
