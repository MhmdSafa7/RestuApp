<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservation;
use DB;

class reservationcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.reservation');
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
        //

        ///print_r($request->input());

        $request->validate([
           'name' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);



        $post = new reservation;
        $post->name =  $request->input('name');
        $post->Email =  $request->input('email');
        $post->phonenumber = $request->input('phonenumber');
        $post->date = $request->input('date');
        $post->time = $request->input('time');
        $post->save();
        return redirect('/reservation');
    }
 }



