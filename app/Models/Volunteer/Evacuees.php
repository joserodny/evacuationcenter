<?php

namespace App\Models\Volunteer;

use App\Models\Admin\Barangay;
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


    //query for constituents

    public function barangay(){
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }

    public function constituents(){
        return $this->belongsTo(Constituents::class, 'constituents_id');
    }
   

    public function scopegetEvacuees($query){

        return $query->leftJoin('constituents', 'constituents.id', '=', 'evacuees.constituents_id')
                    ->leftJoin('barangays', 'barangays.id', '=', 'evacuees.barangay_id')
                    ->leftjoin('evacuations', 'evacuations.id', '=', 'evacuees.evacuation_id')
                    ->select(
                    'constituents.id',   
                    'constituents.first_name',
                    'constituents.middle_name',
                    'constituents.last_name',
                    'constituents.suffix_name',  
                    'constituents.head_id',
                    'barangays.barangay_name',
                    'constituents.gender',
                    'constituents.birthday',
                    'constituents.status_id',
                    'evacuees.constituents_id'
                    )
                    ->orderByDesc('constituents.id');
     }

}
