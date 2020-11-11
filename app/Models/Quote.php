<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{

    protected $table = "quotes";
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'group',
        'author',
        'content',
    ];
}
