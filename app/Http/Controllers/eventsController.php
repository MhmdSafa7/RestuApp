<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use DB;

class eventsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = event::all();
        return view('pages.events')->with('events', $events);
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

        $request->validate([
           'desc' => 'required',
            'enddate' => 'required',
            'src' => 'required',
        ]);


        

        $post = new event;
        $post->desc =  $request->input('desc');
        $post->enddate =  $request->input('enddate');

        if($request->file('src')){
            $file = $request->file('src');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/images'),$filename);
            $post->src = $filename;
        }else{
            //throw error because we can't keep a product without image
            dd($request->all());
        }
        $post->save();
        return redirect('/events');
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
        $data=event::find($id);
        $data->delete();
        return redirect('/events');
    }
}
