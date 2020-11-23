<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Barangay;
use App\Models\Admin\Evacuation;




class BrgyEvacuationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validation = $request->validate(Barangay::$brgyname);

        Barangay::create([
            'barangay_name' => $request['barangay_name']
        ]);

        $request->session()->flash('message', 'Success');
        return back();

    }

    public function storecenter(Request $request)
    {
      $validation = $request->validate(Evacuation::$evacuationname);

       Evacuation::create([
            'brgy_id' => $request['brgy_id'],
            'evacuation_name' => $request['evacuation_name']
        ]);

        $request->session()->flash('message', 'Success');
        return back();

    }
}
