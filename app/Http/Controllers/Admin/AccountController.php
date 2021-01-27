<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Admin\Barangay;
use App\Models\Admin\Evacuation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facade as Debugbar;
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
        //get barangay
        $barangay = Barangay::getBrgy()->get();
        //get users
    
        $user = DB::table('users')
                  ->leftJoin('barangays', 'users.brgy_id', '=', 'barangays.id')
                  ->leftJoin('evacuations', 'users.evacuation_id', '=', 'evacuations.id')
                  ->where('users.id', '!=', Auth::user()->id)
                  ->paginate(10);  

         return view ('admin.accounts',
                     ['barangay' => $barangay,
                     'user'      => $user
                     ]);


    }


    public function getEvacuation($id){
        //barangay evacuation dropdown
        $evacuation = Evacuation::where('brgy_id', $id)
                      ->pluck('evacuation_name', 'id');
        return json_encode($evacuation);
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
        $request->validate(User::$AddValidation);
        //create user
        User::create([
            'brgy_id'       => $request['brgy_id'],
            'evacuation_id' => $request['evacuation_id'],
            'name'          => $request['name'],
            'email'         => $request['email'],
            'number'        => $request['number'],
            'role'          => $request['role'],
            'password'      => bcrypt('EvaVolunteer112'),

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


        //update
       $updateUser = User::findOrFail($request->user_id);
         //validation
         $this->validate($request,[
            'name'   => 'required|string|max:255',
            'email'  => 'required|email||max:255|unique:users,email,'.$updateUser->id,
            'number' => 'required|numeric|digits:11',
        ]);

       $updateUser->update([
            'name'   => $request['name'],
            'email'  => $request['email'],
            'number' => $request['number'],
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
    public function destroy(Request $request, $id)
    {
        //delete users
        User::findOrFail($id)->delete();
        $request->session()->flash('message', 'Success');
        return back();
    }
}
