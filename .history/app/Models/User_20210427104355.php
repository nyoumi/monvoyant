<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Relations\HasOne;
>>>>>>> 61752209ea97f4cfa820ffaf3d821e5a6e3e8714
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
<<<<<<< HEAD
=======

    public function account(): HasOne
    {
        return $this->hasOne(Account::class);
    }
>>>>>>> 61752209ea97f4cfa820ffaf3d821e5a6e3e8714
}
