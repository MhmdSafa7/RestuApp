<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\offer;
use DB;

class offersController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = offer::all();
        return view('pages.offers')->with('offers', $offers);
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
            'offername' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'src' => 'required',
        ]);



        $post = new offer;
        $post->offername =  $request->input('offername');
        $post->desc =  $request->input('desc');
        $post->price = $request->input('price');

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
        return response()->json(['success' => 'Offer deleted successfully']);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=offer::find($id);
        $data->delete();
        return redirect('/offers');
    }
}


