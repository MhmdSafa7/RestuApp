<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservation;
use DB;
use Illuminate\Support\Facades\Auth;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


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

        if (Auth::check()) {
            $post->user_id = Auth::id();
        }

        $post->save();
        return redirect('/reservation')->with('success', 'Reservation successful!');
    }
 }



