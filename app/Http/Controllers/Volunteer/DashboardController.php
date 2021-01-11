<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Admin\Evacuation;
use App\Models\User;
use App\Models\Volunteer\Constituents;
use App\Models\Volunteer\Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Debugbar;

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

        $headfamily = Details::with('barangay', 'consti')->get();
       
      
        return view('volunteer.dashboard', ['headfamily' => $headfamily]);
    }

    public function store(Request $request){
          //validation
          $request->validate(Constituents::$constituenstdetails);

          Constituents::create([
            'user_id'         => Auth::user()->id,
            'first_name'      => $request['first_name'],
            'middle_name'     => $request['middle_name'],
            'last_name'       => $request['last_name'],
            'suffix_name'     => $request['suffix_name'],
            'gender'          => $request['gender'],
            'age'             => $request['age'],
          ]);

        $headid = Constituents::select(['id'])
                ->where('user_id', '=', Auth::user()->id)
                ->first();

          Details::create([
            'constituents_id' => $headid->id,
            'barangay_id'     => Auth::user()->brgy_id,
            'evacuation_id'   => Auth::user()->evacuation_id,
            'status_id'       => 1,
          ]);

          $request->session()->flash('message', 'Success');
          return redirect('volunteer/constituents');
    }


}
