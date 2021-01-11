<?php

namespace App\Models\Admin;

use App\Models\Volunteer\Details;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evacuation extends Model
{
    use HasFactory;



    protected $fillable = [
        'brgy_id',
        'evacuation_name'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static $evacuationname = [
        'brgy_id' => 'required',
        'evacuation_name' => 'required|string|max:255'
    ];

    public function evacuation(){
        return $this->belongsTo(Evacuation::class, 'brgy_id');
    }

    public function barangay(){
        return $this->belongsTo(Barangay::class, 'brgy_id');
    }

    public function details(){
        return $this->belongsTo(Details::class, 'evacuation_id');
    }

   

    public function scopegetEvacuation($query){

        return $query->select('id', 'brgy_id','evacuation_name');
     }
 

}
