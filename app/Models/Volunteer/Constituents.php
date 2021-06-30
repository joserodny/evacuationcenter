<?php

namespace App\Models\Volunteer;

use App\Models\Admin\Barangay;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Constituents extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangay_id',
        'head_id',
        'first_name',
        'middle_name',
        'last_name',
        'suffix_name',
        'gender',
        'birthday',
        'status_id',
        
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
        'birthday' => 'required|date:y-m-d|before_or_equal:today|max:255',

    ];

    public static $constituenstdetails2 = [
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'last_name' => 'required|string|max:255',
        'suffix_name' => 'nullable|string|max:255',
        'gender' => 'required|string|max:255',
        'birthday' => 'nullable|date:y-m-d|before_or_equal:today|max:255',

    ];

  


    public static $fammembervalidation = [
            'moreFields.*.head_id'      => 'required|numeric',  
            'moreFields.*.first_name'   => 'required|string|max:255',
            'moreFields.*.middle_name'  => 'nullable|string|max:255',
            'moreFields.*.last_name'    => 'required|string|max:255',
            'moreFields.*.suffix_name'  => 'nullable|string|max:255',
            'moreFields.*.gender'       => 'required|string|max:255',
            'moreFields.*.birthday'     => 'required|date:y-m-d|before_or_equal:today|max:255',
    ];

    public static $fammembervalidation2 = [ 
        'first_name.*'   => 'required|string|max:255',
        'middle_name.*'  => 'nullable|string|max:255',
        'last_name.*'    => 'required|string|max:255',
        'suffix_name.*'  => 'nullable|string|max:255',
        'gender.*'       => 'required|string|max:255',
        'birthday.*'     => 'nullable|date:y-m-d|before_or_equal:today|max:255',
];



    //query for constituents

    public function scopegetConsti($query){

       return $query->leftJoin('barangays', 'barangays.id', '=', 'constituents.barangay_id')
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
                    'constituents.status_id'
                    )
                    ->orderByDesc('constituents.id');
     }

     public function scopegetConstiEvacuees($query){

        return $query->leftJoin('barangays', 'barangays.id', '=', 'constituents.barangay_id')
                     ->leftJoin('evacuations', 'evacuations.id', '=', 'constituents.evacuation_id')
                     ->select(
                     'constituents.id',   
                     'evacuations.evacuation_name',
                     'barangays.barangay_name',
                     'constituents.birthday',
                     'constituents.status_id',
                     'evacuees.status_id'
                     )
                     ->orderByDesc('constituents.id');
      }
 
      

     
    

 

 



   

}
 