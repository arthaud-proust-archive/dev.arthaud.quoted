<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $roles = [
        'admin' => 4, 
        'user' => 1
    ];

    public function getHashidAttribute()
    {
        return encodeId($this->id);
    }

    public function isAdmin()
    {
        return $this->role >= $this->roles['admin'];
    }

    public function hasRole($role)
    {
        if(!array_key_exists($role, $this->roles))
            return false;
        return $this->role >= $this->roles[$role];
    }

    public function getRolenameAttribute() 
    {
        return array_search($this->role, $this->roles);
    }
}
