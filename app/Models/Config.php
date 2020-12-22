<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Config extends Model
{

    protected $table = "config";
    public $timestamps = false;
    protected $primaryKey = 'key';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'value',
    ];

    public static function valueOf($key)
    {
        if(!$variable = self::firstWhere('key', $key)) {
            return null;
        }
        return $variable->value;
    }

    public static function getVar($key)
    {
        return self::firstWhere('key', $key);
    }
}
