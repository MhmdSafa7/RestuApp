<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Product;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function menuReq(){
        $menuObj = Menu::all();
        return response()->json([$menuObj]);
    }


    public function menuProdReq(){
        $menuProdObj = Menu::with('products')->get();
        return response()->json([$menuProdObj]);
    }


    public function menuProdById(Menu $menu){
        // $menuProdObjById = Menu::with('products')->get($id);
        $menu->products;
        return response()->json([$menu]);
    }




/////////////////////////////////////////////////////////////////////////////////////
     public function index()
    {

        $products = Product::all();
        $menus = Menu::all();
        return view('pages.menu')->with('products', $products)->with('menus', $menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
