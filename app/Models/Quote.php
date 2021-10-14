<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ConfigController;
use App\Models\User;


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
        'group',
        'author',
        'content',
        'user',
        'show',
        'daily_count',
        'source'
    ];

    protected $casts = [
        'source' => 'array'
    ];

    public function getHashidAttribute()
    {
        return encodeId($this->id);
    }

    public function getUserModelAttribute()
    {
        return User::firstWhere('id', decodeId($this->user));
    }

    public function canUserTouch() 
    {
        if(!Auth::check())
            return false;
        
        $user = Auth::user();

        if($user->isAdmin())
            return true;
        
        return $user->hashid == $this->user;
    }

    public function scopeVerified($query)
    {
        return $query->where('show', 1);
    }

    public function scopeUnVerified($query)
    {
        return $query->where('show', 0);
    }

    public function scopeDaily($query)
    {
        return $query->firstWhere('id', ConfigController::get('daily_quote'));
    }
}
