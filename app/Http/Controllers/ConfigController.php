<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Config;
use Validator;


class ConfigController
{
    public function index(Request $request) {
        return Config::all();
    }

    public function show(Request $request, $key) {
        return Config::valueOf($key);
    }

    public static function get($key) {
        return Config::valueOf($key);
    }

    public static function set($key, $value=null) {
        $variable = Config::getVar($key);
        if(!$variable) {
            Config::create([
                'key' => $key,
                'value' => $value
            ]);
        } else  {
            if($value == "null") {
                $variable->delete();
            } else {
                $variable->value = $value;
                $variable->save();
            }
        }
    }
}

