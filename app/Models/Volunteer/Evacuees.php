<?php

namespace App\Models\Volunteer;

use App\Models\Admin\Barangay;
use App\Models\Admin\Evacuation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evacuees extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'constituents_id',
        'barangay_id',
        'evacuation_id',
        'typhoon_id',
        'head_id',
        'evacuees_num',
        'status_id',
        
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


  

    public function barangay(){
        return $this->belongsTo(Barangay::class);
    }

    public function constituents(){
        return $this->belongsTo(Constituents::class);
    }

    public function evacuation(){
        return $this->belongsTo(Evacuation::class);
    }
   

    // public function scopegetEvacuees($query){

    //     return $query->leftJoin('constituents', 'constituents.id', '=', 'evacuees.constituents_id')
    //                 ->leftJoin('barangays', 'barangays.id', '=', 'evacuees.barangay_id')
    //                 ->leftjoin('evacuations', 'evacuations.id', '=', 'evacuees.evacuation_id')
    //                 ->select(
    //                 'constituents.id',   
    //                 'constituents.first_name',
    //                 'constituents.middle_name',
    //                 'constituents.last_name',
    //                 'constituents.suffix_name',  
    //                 'constituents.head_id',
    //                 'barangays.barangay_name',
    //                 'constituents.gender',
    //                 'constituents.birthday',
    //                 'constituents.status_id',
    //                 'evacuees.constituents_id'
    //                 )
    //                 ->orderByDesc('constituents.id');
    //  }

}
