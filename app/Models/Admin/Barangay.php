<?php

namespace App\Models\Admin;

use App\Models\Volunteer\Details;
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
        return $this->belongsTo(Evacuation::class, 'brgy_id');
    }

    public function barangay(){
        return $this->belongsTo(Barangay::class, 'brgy_id');
    }

    public function details(){
        return $this->belongsTo(Details::class, 'barangay_id');
    }

    public function scopegetBrgy($query){

       return $query->select('barangay_name', 'id');
    }


}
