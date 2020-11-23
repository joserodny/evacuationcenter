<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Barangay;
use App\Models\Admin\Evacuation;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangay = Barangay::select('barangay_name', 'id')->get();


        $user = DB::table('users')
                    ->leftJoin('barangays', 'barangays.id', '=', 'users.brgy_id' )
                    ->leftJoin('evacuations', 'evacuations.id', '=', 'users.evacuation_id' )
                    ->where('role', '=', 'user')
                    ->get();

        return view ('admin.accounts', ['barangay' => $barangay, 'user' => $user]);


    }


    public function getEvacuation($id){

        $evacuation = Evacuation::where('brgy_id', $id)->pluck('evacuation_name', 'id');
        return json_encode($evacuation);
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
        $validation = $request->validate(User::$accountValidation);
        //create user
        User::create([
            'brgy_id' => $request['brgy_id'],
            'evacuation_id' => $request['evacuation_id'],
            'name' => $request['name'],
            'email' => $request['email'],
            'number' => $request['number'],
            'role' => $request['role'],
            'password' => bcrypt('EvaVolunteer112'),

        ]);

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
        //
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
