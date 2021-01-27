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
use Illuminate\Support\Facades\DB;

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
      // $headfamily = Details::with('barangay', 'consti')
      //             ->orderBy('id', 'DESC')
      //             ->get();barangays
       $headfamily = DB::table('constituents')
                      ->leftJoin('barangays', 'barangays.id', '=', 'constituents.barangay_id')
                      ->groupBy('constituents.head_id')
                      ->orderBy('constituents.id', 'DESC')
                      ->select(DB::raw('count(constituents.head_id) as familymember'), 'constituents.*', 'barangays.barangay_name')
                      ->paginate(10);   
        
      return view('volunteer.dashboard', ['headfamily' => $headfamily]);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $headfam = Constituents::
      where('id', $id)
      ->first();
     
      return view('volunteer.constituents', ['headfam' => $headfam]);
    }


    public function familymembers(){
      return view('volunteer.constituents');
    }

    public function store(Request $request){
          //validation
          $request->validate(Constituents::$constituenstdetails);

          Constituents::create([
            'barangay_id'     => Auth::user()->brgy_id,
            'head_id'         => 0,
            'first_name'      => $request['first_name'],
            'middle_name'     => $request['middle_name'],
            'last_name'       => $request['last_name'],
            'suffix_name'     => $request['suffix_name'],
            'gender'          => $request['gender'],
            'age'             => $request['age'],
            'status_id'       => 0,
          ]);

      
          // Details::create([
          //   //'constituents_id' => ,
          //   'barangay_id'     => Auth::user()->brgy_id,
          //   'evacuation_id'   => Auth::user()->evacuation_id,
          //   'status_id'       => 1,
          // ]);
        

          $request->session()->flash('message', 'Success');
          return redirect('volunteer/dashboard');
    }


}
