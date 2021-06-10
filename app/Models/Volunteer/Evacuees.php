<?php

namespace App\Models\Volunteer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evacuees extends Model
{
    use HasFactory;

    protected $fillable = [
        'constituents_id',
        'barangay_id',
        'evacuation_id',
        'typhoon_id',
        'head_id',
        'evacuees_num',
        'id',
    ];

     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static $evacuees = [
        'constituents_id ' => 'numeric',
        'barangay_id'      => 'numeric',
        'evacuation_id'    => 'numeric',
        'typhoon_id'       => 'numeric',
        'evacuees_num'     => 'numeric',
    ];


}
