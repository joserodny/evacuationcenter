<?php

namespace App\Models\Volunteer;

use App\Models\Admin\Barangay;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constituents extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangay_id',
        'evacuation_id',
        'head_id',
        'first_name',
        'middle_name',
        'last_name',
        'suffix_name',
        'gender',
        'age',
        'status_id'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static $constituenstdetails = [
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'last_name' => 'required|string|max:255',
        'suffix_name' => 'nullable|string|max:255',
        'gender' => 'required|string|max:255',
        'age' => 'required|numeric|max:255',

    ];





   

}
 