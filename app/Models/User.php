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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    protected $fillable=[
        'email',
        'master_account_id',
        'role_id',
        'user_name',
        'user_salt',
        'password',
        'last_accessed',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'last_accessed' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }
}
