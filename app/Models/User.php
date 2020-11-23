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
        'brgy_id',
        'evacuation_id',
        'name',
        'email',
        'number',
        'role',
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

    public static $accountValidation = [
        'brgy_id' => 'required',
        'evacuation_id' => 'required',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users|max:255',
        'number' => 'required|string|digits:11',
        'role' => 'required|string'

    ];





}
