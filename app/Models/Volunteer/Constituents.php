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
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'suffix_name',
        'gender',
        'age',
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

    public function details(){
        return $this->belongsTo(Details::class, 'constituents_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

   

}
