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

    public function evacuation(){
        return $this->belongsTo('App\Models\Admin\Evacuation', 'brgy_id');
    }

    public function barangay(){
        return $this->belongsTo('App\Models\Admin\Barangay', 'brgy_id');
    }

    public function scopegetBrgy($query){

       return $query->select('barangay_name', 'id');
    }


}
