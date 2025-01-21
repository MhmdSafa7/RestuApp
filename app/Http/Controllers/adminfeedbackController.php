<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedback;
use DB;
class adminfeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $feedback=feedback::orderBy ('id', 'desc')->get();
        return view('pages.admin_feedback')->with('feedback',$feedback);
    }

    
}
