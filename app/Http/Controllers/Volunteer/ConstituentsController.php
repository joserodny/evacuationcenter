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

        $headfam = Constituents::
                where('id', $id)
                ->first();
               
        return view('volunteer.constituents', ['headfam' => $headfam]);
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
    public function store(Request $request)
    {

        //update familyhead id
        
        


        //validation
          $request->validate([
            'moreFields.*.head_id'      => 'required|numeric|max:255',  
            'moreFields.*.first_name'   => 'required|string|max:255',
            'moreFields.*.middle_name'  => 'nullable|string|max:255',
            'moreFields.*.last_name'    => 'required|string|max:255',
            'moreFields.*.suffix_name'  => 'nullable|string|max:255',
            'moreFields.*.gender'       => 'required|string|max:255',
            'moreFields.*.age'          => 'required|numeric|max:255',
          ]);

          foreach ($request->moreFields as $key => $value){
           Constituents::create([
                'barangay_id'     => Auth::user()->brgy_id,  
                'head_id'         => $value['head_id'],  
                'first_name'      => $value['first_name'],
                'middle_name'     => $value['middle_name'],
                'last_name'       => $value['last_name'],
                'suffix_name'     => $value['suffix_name'],
                'gender'          => $value['gender'],
                'age'             => $value['age'],
                'status_id'       => 0,
              ]);
            
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //update
       $updateUser = Constituents::findOrFail($request->head_id);
       

     $updateUser->update([
          'head_id'   => $request->head_id,
     ]);

     return redirect()->to('volunteer/familymember/'. $request->head_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
