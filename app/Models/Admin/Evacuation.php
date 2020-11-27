<?php

namespace App\Models\Admin;

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

    public function barangay(){
        return $this->belongsTo('App\Models\Admin\Barangay', 'brgy_id');
    }

    public function user(){
        return $this->hasMany('App\Models\User');
    }


}
