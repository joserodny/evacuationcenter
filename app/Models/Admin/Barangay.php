<?php

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;



    protected $fillable = [
        'barangay_name',
    ];


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static $brgyname = [
        'barangay_name' => 'required|unique:barangays|string|max:255',
    ];

  


}
