<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Volunteer\Constituents;
use App\Models\Volunteer\Details;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\Handler;
class ConstituentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id){

        //total evacuees
        $userbrgy_id = Auth::user()->brgy_id;
       
        
        $familymember = Constituents::where('head_id', '=', $id)->get();
       
        if($familymember->isEmpty()){
            return view('layouts.404');
        } else{
            return view('volunteer.familymember', 
            [
            'familymember' => $familymember, 
            'id'           => $id
            ] );
        }
       
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
                'birthday'        => Carbon::parse($value['birthday'])->age,
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

         //total evacuees
         $userbrgy_id = Auth::user()->brgy_id;
        


        $userId = Auth::user()->id;
        $headfam = Constituents::
        where('id', $id)
        ->whereIn('status_id', [$userId, 1])
        ->first();

    
        if($headfam == NULL){
            return view('layouts.404');
        }else{
            return view('volunteer.constituents', ['headfam' => $headfam]);
        }
        
       
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
        $request->validate(Constituents::$constituenstdetails2);
         if(empty($request['birthday'])) {
            Constituents::where('id', '=', $request->id)
            ->update([
                'first_name'    => $request['first_name'],
                'middle_name'   => $request['middle_name'],
                'last_name'     => $request['last_name'],  
                'suffix_name'   => $request['suffix_name'],
                'gender'        => $request['gender'],
               
            ]);
                }else{
                    Constituents::where('id', '=', $request->id)
                    ->update([
                        'first_name'    => $request['first_name'],
                        'middle_name'   => $request['middle_name'],
                        'last_name'     => $request['last_name'],  
                        'suffix_name'   => $request['suffix_name'],
                        'gender'        => $request['gender'],
                        'birthday'      => Carbon::parse($request->birthday)->age,
                    ]);
                }
        return back();                
    }

    public function updateAll(Request $request){
      
        $request->validate(Constituents::$fammembervalidation2);
       
        if(count($request->id) > 0){
         
            foreach ($request->id as $key => $value){
               

                $birtdate = $request->birthday[$key];
                if(empty($birtdate)){
                    
                        $member = array(  
                            'first_name'      => $request->first_name[$key],
                            'middle_name'     => $request->middle_name[$key],
                            'last_name'       => $request->last_name[$key],
                            'suffix_name'     => $request->suffix_name[$key],
                            'gender'          => $request->gender[$key],
                        ); 
                     
                        $q = Constituents::where('id', $request->id[$key])->first();
                       
                        $q->update($member);
   
                    }else{
                      
                    $member = array(  
                         'first_name'      => $request->first_name[$key],
                         'middle_name'     => $request->middle_name[$key],
                         'last_name'       => $request->last_name[$key],
                         'suffix_name'     => $request->suffix_name[$key],
                         'gender'          => $request->gender[$key],
                         'birthday'        => Carbon::parse($request->birthday[$key])->age,
                       ); 
                      $q = Constituents::where('id', $request->id[$key])->first();
                      $q->update($member);
        
                    }
                   
                    $request->session()->flash('message', 'Family member updated');
                    return redirect()->to('volunteer/dashboard');        
                   
     
                }
            }
        
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
