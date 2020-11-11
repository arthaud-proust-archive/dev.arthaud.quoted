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
        return view('home', ["lastquotes"=>Quote::all()->take(5)]);
    }
}
