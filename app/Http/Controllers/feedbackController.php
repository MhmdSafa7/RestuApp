<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedback;
use DB;

class feedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $feedback=feedback::orderBy ('id', 'desc')->get()->take(5);
        return view('pages.feedback')->with('feedback',$feedback);
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

       /// print_r($request->input());

       $request->validate([
        'name' => 'required',
            'email' => 'required',
            'star' => 'required',
            'message' => 'required',
    ]);


        $post = new feedback;
        $post->name =  $request->input('name');
        $post->Email =  $request->input('email');
        $post->rate = $request->input('star');
        $post->body = $request->input('message');
        $post->save();
        return redirect('/feedback');
    }

}
