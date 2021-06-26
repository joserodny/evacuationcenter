<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Barangay;
use App\Models\Admin\Typhoon;
use App\Models\Volunteer\Constituents;
use Illuminate\Http\Request;

class TyphoonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangay = Barangay::getBrgy()->get();
        $typhoon = Typhoon::paginate(5);
  
        return view('admin.typhoon',
        ['barangay' => $barangay, 
        'typhoon' => $typhoon,
      
    ]);
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
        //validation
        $request->validate(Typhoon::$addtyphoon);
        //add typhoon
        Typhoon::create([
          'typhoon_name' => $request['typhoon_name'],
          'status' => 1,  
        ]);

        $request->session()->flash('message', 'Success');
        return back();
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
        $updateTyphoon = Typhoon::findOrFail($request->id);

        $this->validate($request,[
            'typhoon_name'   => 'required|string|max:255',
        ]);

        $updateTyphoon->update([
            'typhoon_name' => $request['typhoon_name'],
        ]);

        $request->session()->flash('message', 'Success');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function statupdate(Request $request, $id)
    {
          //update
     $updateUser = Typhoon::findOrFail($request->id);
     
     $updateUser->update([
          'status'   => 0,
     ]);

     $request->session()->flash('message', 'Success');
     return back();
    }


    public function destroy(Request $request, $id)
    {
        Typhoon::findOrFail($id)->delete();
        $request->session()->flash('message', 'Success');
        return back();
    }
}
