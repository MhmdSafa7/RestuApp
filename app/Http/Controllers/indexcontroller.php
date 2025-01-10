<?php

namespace App\Http\Controllers;
use App\Models\offer;
use App\Models\event;
use Illuminate\Http\Request;

class indexcontroller extends Controller
{
    public function index(){

        $off = offer::orderBy ('id')->get()->take(3);
        $eve = event::orderBy ('id')->get()->take(3);
        return view('pages.index')->with('off',$off)->with('eve',$eve);
    }
}
