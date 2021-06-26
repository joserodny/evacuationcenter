<?php

namespace App\Models;

use App\Models\Admin\Barangay;
use App\Models\Admin\Evacuation;
use App\Models\Volunteer\Constituents;
use App\Models\Volunteer\Details;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_municipality_id',
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

    public static $AddValidation = [
        'brgy_id'       => 'required',
        'evacuation_id' => 'required',
        'name'          => 'required|string|max:255',
        'email'         => 'required|email|unique:users|max:255',
        'number'        => 'required|string|digits:11|numeric',
        'role'          => 'required|string|in:admin,user'

    ];

    public function evacuation(){
        return $this->belongsTo(Evacuation::class, 'evacuation_id');
    }

    public function barangay(){
        return $this->belongsTo(Barangay::class, 'brgy_id');
    }

    public function details(){
        return $this->belongsTo(Details::class, 'user_id');
    }

    public function consti(){
        return $this->belongsTo(Constituents::class, 'user_id', 'id');
    }

  

}
