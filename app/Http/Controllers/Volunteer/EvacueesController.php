<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Admin\Evacuation;
use App\Models\Volunteer\Constituents;
use App\Models\Volunteer\Evacuees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Debugbar;
class EvacueesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate(Evacuees::$evacuees);
        $famMember = Constituents::where('head_id', '=', $request['constituents_id'])->count();
        Evacuees::Create([
            'constituents_id' => $request['constituents_id'],
            'barangay_id'     => Auth::user()->brgy_id,
            'evacuation_id'   => Auth::user()->evacuation_id,
            'typhoon_id'      => $request['typhoon_id'],
            'evacuees_num'    => $famMember,
        ]);

        //update family head status
         //$updateUser = Constituents::findOrFail($request->constituents_id);

        
        // $updateUser->update([
        //      'status_id'   => 0,
        // ]);
            
      
        $head = Constituents::select('head_id', 'id', 'status_id')->where('id', '=', $request->constituents_id)->first();
        $famId = $head->head_id;
                if(empty($famId)){
                   Constituents::where('id', '=', $request->constituents_id)
                                ->update(['status_id' => '4']);
                }else{
                    Constituents::where('head_id', '=', $request->constituents_id)
                    ->update(['status_id' => '3']);
                }

        $request->session()->flash('message', 'Success');
       
        return back();
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
    public function update(Request $request, $id)
    {
         //update
        // $updateUser = Constituents::findOrFail($request->id);
        


        // $updateUser->update([
        //     'status_id'   => 1,
        // ]);

             
        Constituents::where('head_id', '=', $id)
                    ->update(['status_id' => '1']);
    
        $request->session()->flash('message', 'Success');
        return back();
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
