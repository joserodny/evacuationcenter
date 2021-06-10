<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Volunteer\Constituents;
use App\Models\Volunteer\Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConstituentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index($id){

        $familymember = Constituents::where('head_id', '=', $id)->get();


        return view('volunteer.familymember', ['familymember' => $familymember, 'id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {

        $userId = Auth::user()->id;
        //update familyhead id
        
        //validation
        $request->validate(Constituents::$fammembervalidation);

          foreach ($request->moreFields as $key => $value){
           Constituents::create([
                'barangay_id'     => Auth::user()->brgy_id,  
                'head_id'         => $value['head_id'],  
                'first_name'      => $value['first_name'],
                'middle_name'     => $value['middle_name'],
                'last_name'       => $value['last_name'],
                'suffix_name'     => $value['suffix_name'],
                'gender'          => $value['gender'],
                'birthday'        => $value['birthday'],
                'status_id'       => 1,
              ]); 

            $headFam = $value['head_id']; 
            $head = Constituents::select('head_id', 'id', 'status_id')->where('id', '=', $value['head_id'])->first();
            
            $famId = $head->head_id;
            if(empty($famId)){
                Constituents::where('status_id', $userId)
                ->first()
                ->update([
                  'head_id' =>  $headFam,
                  'status_id' => 1,
               ]);  
                }
          }

          
         

          $request->session()->flash('message', 'Success');
          return redirect()->to('volunteer/dashboard');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
      $familymember = Constituents::where('head_id', '=', $id)->get();
    
      $headfam = Constituents::
        where('id', $id)
        ->first();
       
        return view('volunteer.constituents', ['headfam' => $headfam, 'familymember' => $familymember]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
               
        Constituents::where('id', '=', $request->id)
                    ->update([
                        'first_name'    => $request['first_name'],
                        'middle_name'   => $request['middle_name'],
                        'last_name'     => $request['last_name'],  
                        'suffix_name'   => $request['suffix_name'],
                        'gender'        => $request['gender'],

                    ]);
        return back();                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //delete users
        Constituents::findOrFail($id)->delete();
        $request->session()->flash('message', 'Success');
        return back();
    }

    public function destroyindi(Request $request, $id)
    {
        //delete users
        Constituents::findOrFail($id)->delete();
        $request->session()->flash('message', 'Success');
        return back();
    }

    public function removeAll(Request $request, $id){

        Constituents::where('head_id', '=', $id)->delete();
        $request->session()->flash('message', 'Success');
        return redirect()->to('volunteer/dashboard');
    }

}
