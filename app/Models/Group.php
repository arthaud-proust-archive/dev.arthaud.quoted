<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Group extends Model
{

    protected $table = "groups";
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'name',
        'role'
    ];


    public function canUserPost() {
        if(!Auth::check())
            return false;
        
        $user = Auth::user();

        if($user->isAdmin())
            return true;

        return $user->role >= $this->minrole;
    }
}
