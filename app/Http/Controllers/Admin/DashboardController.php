<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Barangay;
use App\Models\Admin\Evacuation;
use App\Models\Volunteer\Constituents;
use App\Models\Volunteer\Evacuees;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;
use DataTables;
use Yajra\DataTables\DataTables as DataTablesDataTables;

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
        $barangay = Barangay::select('id', 'barangay_name')->get();

        $evacuation = Evacuation::with('barangay')->select('brgy_id','evacuation_name')->get();
       
        $totalEvacuees  = Constituents::select('status_id')->whereIn('status_id', [3,4])->count();


        $MaleFemale = (new LarapexChart)->pieChart()
        ->setTitle('Active Evacuees by gender')
        ->addData([
            Constituents::select('gender')->where('gender', 'Male')->whereIn('status_id', [3,4])->count(),
            Constituents::select('gender')->where('gender', 'Female')->whereIn('status_id', [3,4])->count()
        ])
        ->setColors(['#00E38E', '#ff6384'])
        ->setLabels(['Male', 'Female']);

      

        return view ('admin.dashboard',
        ['barangay'     => $barangay, 
        'evacuation'    => $evacuation, 
        // 'chart'         => $chart,
        'MaleFemale'    => $MaleFemale,
        'totalEvacuees' => $totalEvacuees
       
        ]);

    }

    public function getEvacuees(Request $request){

        if($request->ajax()) {
            $getEvacuees = Evacuees::getEvacuees()
            ->select(
                'barangay_name', 
                'evacuation_name', 
                 DB::raw(
                     '
                      count(constituents.head_id) as family,
                      sum(evacuees_num) as individual,
                      sum(constituents.birthday Between 0 and 2) as infant,
                      sum(constituents.birthday Between 3 and 12) as child,
                      sum(constituents.birthday Between 13 and 59) as adult,
                      sum(constituents.birthday Between 60 and 200) as senior
                     '))
            ->where('evacuees.status_id', '=', 1)   
            ->whereIn('constituents.status_id', [3,4])
            ->groupBy('evacuees.evacuation_id')
            ->get();
          return DataTablesDataTables::of($getEvacuees)->make(true);
              
            }
            
    }

    //get barangay
    public function getBrgy(Request $request){
        if($request->ajax()) {
            $barangay = Barangay::select('id', 'barangay_name')->get();
          return DataTables::of($barangay)
                
                ->addColumn('action', function($barangay){
                    $btn = '  <button class="btn btn-sm btn-primary btn-icon-only rounded-circle" type="button">
                                    <span class="btn-inner-icon"><i class="far fa-edit"></i></span>
                                </button>';                
                    return $btn; 
                })
                ->rawColumns(['action'])
                ->make(true);
          }
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
