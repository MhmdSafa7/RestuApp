<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservation;
use DB;

class adminreservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res=reservation::orderBy ('date', 'desc')->get();
        return view('pages.admin_reservation')->with('res',$res);
    }

   
}
