<?php

namespace App\Models\Volunteer;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Barangay;
use App\Models\Admin\Evacuation;


class Details extends Model
{
    use HasFactory;

    protected $fillable = [
        'constituents_id',
        'barangay_id',
        'evacuation_id',
        'status_id',
    ];

    public function consti(){
        return $this->belongsTo(Constituents::class, 'constituents_id');
    }

    public function barangay(){
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }

    public function evacuation(){
        return $this->belongsTo(Evacuation::class, 'evacuation_id');
    }

    
}
