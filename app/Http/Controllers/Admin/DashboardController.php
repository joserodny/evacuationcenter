<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Barangay;
use Illuminate\Http\Request;

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
        return view('admin.dashboard');

    }

    public function getbrgydashboard()
    {
        $barangay = Barangay::select('barangay_name', 'id')->get();
        return view ('admin.dashboard', ['barangay' => $barangay]);
    }


    public function getbrgyevacuation()
    {
        $barangay = Barangay::select('barangay_name', 'id')->get();
        return view ('admin.evacuation', ['barangay' => $barangay]);
    }






}
