<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Barangay;
use App\Models\Admin\Evacuation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {

        $this->middleware('auth');
        }

    public function index()
    {
        //get barangay
        $barangay = Barangay::getBrgy()->get();

        $evacuation = Evacuation::with('barangay')->getEvacuation()->get();

        return view ('admin.dashboard', ['barangay' => $barangay, 'evacuation' => $evacuation]);

    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storebrgy(Request $request)
    {
        $request->validate(Barangay::$brgyname);

        Barangay::create([
            'barangay_name' => $request['barangay_name']
        ]);

        $request->session()->flash('message', 'Success');
        return back();

    }

    public function storeevacuation(Request $request)
    {
        $request->validate(Evacuation::$evacuationname);

       Evacuation::create([
            'brgy_id' => $request['brgy_id'],
            'evacuation_name' => $request['evacuation_name']
        ]);

        $request->session()->flash('message', 'Success');
        return back();

    }




}
