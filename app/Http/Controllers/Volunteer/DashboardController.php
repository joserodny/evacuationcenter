<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Admin\Evacuation;
use App\Models\Admin\Typhoon;
use App\Models\User;
use App\Models\Volunteer\Constituents;
use App\Models\Volunteer\Details;
use App\Models\Volunteer\Evacuees;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Debugbar;
use Illuminate\Support\Facades\DB;
use DataTables;
use ArielMejiaDev\LarapexCharts\LarapexChart;
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

    public function index(Request $request)
    {
      $userId = Auth::user()->id;
      $userbrgy_id = Auth::user()->brgy_id;
      $statId = Constituents::getConsti()->where('status_id', $userId)->first();
      $typhoon = Typhoon::where('status', 1)->get();    
      

      

      //active evacueesAge
         $activeEvacueesAge =  Constituents::select(DB::raw(
          'sum(birthday Between 0 and 2) as infant,
           sum(birthday Between 3 and 12) as child,
           sum(birthday Between 13 and 59) as adult,
           sum(birthday Between 60 and 200) as senior
          '))
         ->where('evacuation_id', Auth::user()->evacuation_id)
         ->whereIn('status_id', [3,4])
         ->first();        
      //dashboard charts
      $chart = (new LarapexChart)->horizontalBarChart()
      ->setTitle('Evacuess Charts')
      ->setColors(['#00E38E'])
      ->addData('', [$activeEvacueesAge['infant'], $activeEvacueesAge['child'], $activeEvacueesAge['adult'], $activeEvacueesAge['senior']])
      ->setXAxis(['infant', 'Child', 'Adult', 'Senior'])
      ->setGrid();



      $totalEvacuees      = Constituents::where('evacuation_id', '=', Auth::user()->evacuation_id)->whereIn('status_id', [3,4])->count();
      $totalMale          = Constituents::where('gender', 'Male')->where('evacuation_id', '=', Auth::user()->evacuation_id)->whereIn('status_id', [3,4])->count();
      $totalFemale        = Constituents::where('gender', 'Female')->where('evacuation_id', '=', Auth::user()->evacuation_id)->whereIn('status_id', [3,4])->count();

      return view('volunteer.dashboard', 
      [
      'typhoon'       => $typhoon,
      'statId'        => $statId,
      'totalEvacuees' => $totalEvacuees,
      'totalMale'     => $totalMale,
      'totalFemale'   => $totalFemale,
    ], compact('chart'));         
    }
    //show head of family
    public function familyHead(Request $request){
      if($request->ajax()) {
        $headfamily = Constituents::getConsti()
        ->groupBy('head_id')
        ->where('constituents.status_id', '=', 1)
        ->get();
        return DataTables::of($headfamily)
              
                ->addColumn('addfam', function($headfamily){
                  $tes = ' <a href="./familymember/'.$headfamily->id.'" class="btn btn-primary" type="submit">
                            <span class="btn-inner-icon">
                              <i class="fas fa-users"> <i class="fas fa-plus"></i></i>
                            </span>
                            </a>';               
                  return $tes; 
              })
              ->addColumn('action', function($headfamily){
                  $btn = '  <a href="./familymember/edit/'.$headfamily->head_id.'"
                            class="btn btn-icon btn-warning " style="color:white;">
                            <i class="fas fa-edit"></i>
                            </a>';
                  $btn .= ' <button data-constituents_id="'.$headfamily->head_id.'" class="btn btn-icon bg-gradient-green" type="button" data-toggle="modal" data-target="#addevacuees">
                            <span class="btn-inner--icon"><i class="fas fa-hospital-alt" style="color:white;"></i></span>
                            <span class="btn-inner--icon"><i class="fas fa-plus" style="color:white;"></i></span>
                            </button>';                     
                  return $btn; 
              })
              ->rawColumns(['addfam','action'])
              ->make(true);
        }
    }



  //show individual     
    public function individual(Request $request){
      if($request->ajax()) {
      
        $individual = Constituents::getConsti()
            ->where('constituents.status_id', '=', 2)
            ->get();                   
        return DataTables::of($individual)
                ->addColumn('hidden', function($individual){
                  $btn = ' <h1></h1>';                 
                  return $btn; 
              })
              ->addColumn('action', function($individual){
                   
                
                  $btn = '<a href="./remove/'.$individual->id.'"
                          class="btn btn-icon btn-danger delete-all"  style="color:white;">
                          <i class="far fa-trash-alt"></i>
                          </a>
                          <script>
                          $(".delete-all").on("click", function (event) {
                            event.preventDefault();
                            const url = $(this).attr("href");
                            swal({
                                title: "Are you sure you want to remove?",
                                text: "This record and it`s details will be permanantly deleted!",
                                icon: "warning",
                                buttons: ["Cancel", "Yes!"],
                                dangerMode:true,
                            }).then(function(value) {
                                if (value) {
                                    window.location.href = url;
                                }
                            });
                        });
                        </script>';
                  $btn .= ' <button 
                            data-id="'.$individual->id.'" 
                            data-first_name="'.$individual->first_name.'" 
                            data-middle_name="'.$individual->middle_name.'"
                            data-last_name="'.$individual->last_name.'"
                            data-suffix_name="'.$individual->suffix_name.'"
                            data-gender="'.$individual->gender.'"
                            data-age="'.$individual->birthday.'"
                            class="btn btn-icon btn-warning" type="button" data-toggle="modal" data-target="#editIndi">
                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                            </button>';             


                  $btn .= ' <button data-constituents_id="'.$individual->id.'" class="btn btn-icon bg-gradient-green" type="button" data-toggle="modal" data-target="#addevacuees">
                            <span class="btn-inner--icon"><i class="fas fa-hospital-alt" style="color:white;"></i></span>
                            <span class="btn-inner--icon"><i class="fas fa-plus" style="color:white;"></i></span>
                            </button>';   
                                  
                  return $btn; 
              })
              ->rawColumns(['hidden','action'])
              ->make(true);
        }
    }

    //show active evacuees per family head   
    public function evacueeshead(Request $request){
      $evaId = Auth::user()->evacuation_id;
      if($request->ajax()) {
      
        //active evacuees                    
      $evacuees =  Constituents::getConsti()
              ->where('status_id', '=', 3)
              ->where('evacuation_id', '=', $evaId)
              ->groupBy('head_id')
              ->get();              
        return DataTables::of($evacuees)
              ->addColumn('action', function($evacuees){
                  $btn = ' <a href="./evacuees/update/'.$evacuees->head_id.'"
                            class="btn btn-sm btn-warning btn-icon-only rounded-circle update-confirm" style="color:white;">
                            <i class="fas fa-sign-out-alt"></i>
                            </a>
                            
                            <script>
                            $(".update-confirm").on("click", function (event) {
                              event.preventDefault();
                              const url = $(this).attr("href");
                              swal({
                                  title: "Are you sure?",
                                  text: "This person and his family is already outside in evacuation area.",
                                  icon: "warning",
                                  buttons: ["Cancel", "Yes!"],
                                  dangerMode:true,
                              }).then(function(value) {
                                  if (value) {
                                      swal({
                                          icon: "success",
                                          title: "Your work has been saved",
                                          buttons: false,
                                          timer: 1500
                                      })
                                      window.location.href = url;
                                  }
                      
                              });
                          });
                            </script> ';                        
                  return $btn; 
              })
              ->rawColumns(['action'])
              ->make(true);
        }
    }


    //show active evacuees individual
    public function evacueesindi(Request $request){
      $evaId = Auth::user()->evacuation_id;
      if($request->ajax()) {
      
        //active evacuees                    
     
      $evacuees =  Constituents::getConsti()
                ->where('evacuation_id', '=', $evaId)
                ->where('status_id', '=', 4)
                ->get();    
            
         
        return DataTables::of($evacuees)
              ->addColumn('action', function($evacuees){
                  $btn = ' <a href="./evacuees/update/'.$evacuees->id.'"
                            class="btn btn-sm btn-warning btn-icon-only rounded-circle update-confirm" style="color:white;">
                            <i class="fas fa-sign-out-alt"></i>
                            </a>
                            
                            <script>
                            $(".update-confirm").on("click", function (event) {
                              event.preventDefault();
                              const url = $(this).attr("href");
                              swal({
                                  title: "Are you sure?",
                                  text: "This person and his family is already outside in evacuation area.",
                                  icon: "warning",
                                  buttons: ["Cancel", "Yes!"],
                                  dangerMode:true,
                              }).then(function(value) {
                                  if (value) {
                                      swal({
                                          icon: "success",
                                          title: "Your work has been saved",
                                          buttons: false,
                                          timer: 1500
                                      })
                                      window.location.href = url;
                                  }
                      
                              });
                          });
                            </script> ';                        
                  return $btn; 
              })
              ->rawColumns(['action'])
              ->make(true);
             
        }
       
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
          $userId = Auth::user()->id;

         
          Constituents::create([
            'barangay_id'     => Auth::user()->brgy_id,
            'head_id'         => null,
            'first_name'      => $request['first_name'],
            'middle_name'     => $request['middle_name'],
            'last_name'       => $request['last_name'],
            'suffix_name'     => $request['suffix_name'],
            'gender'          => $request['gender'],
            'birthday'        => Carbon::parse($request['birthday'])->age,
            'status_id'       => $userId,
          ]);
          $statId = Constituents::getConsti()
          ->where('status_id', $userId)->first();

          $headId = $statId->id;
         
          $request->session()->flash('message', 'Success');
          return redirect("volunteer/familymember/$headId");
    }

    public function storeindi(Request $request){
      //validation
      $request->validate(Constituents::$constituenstdetails);

      Constituents::create([
        'barangay_id'     => Auth::user()->brgy_id,
        'head_id'         => null,
        'first_name'      => $request['first_name'],
        'middle_name'     => $request['middle_name'],
        'last_name'       => $request['last_name'],
        'suffix_name'     => $request['suffix_name'],
        'gender'          => $request['gender'],
        'birthday'        => Carbon::parse($request['birthday'])->age,
        'status_id'       => 2,
      ]);
      
  

      $request->session()->flash('message', 'Success');
      return back();
}

}
