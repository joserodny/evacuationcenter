<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typhoon extends Model
{
    use HasFactory;


    protected $fillable = [
        'typhoon_name',
        'status',
    ];

     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static $addtyphoon = [
        'typhoon_name' => 'required|string|max:255',
    ];

}
