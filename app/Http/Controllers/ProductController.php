<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Menu;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $menus = Menu::all();
        $products = Product::all();
        return view('pages.product')->with('products', $products)->with('menus',$menus);


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
            'desc' => 'required',
            'price' => 'required',
            'src' => 'required',
            'menu_type' => 'required',
        ]);



        $prod = new Product;
        $prod->name =  $request->input('name');
        $prod->price =  $request->input('price');
        $prod->description = $request->input('desc');
        $prod->menu_id = $request->input('menu_type');


        //dd($request->all());

        if($request->file('src')){
            $file = $request->file('src');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/images'),$filename);
            $prod->src = $filename;
        }else{
            //throw error because we can't keep a product without image
            dd($request->all());
        }
        $prod->save();
        return redirect('/product');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Product::find($id);
        $data->delete();
        return redirect('/product');
    }
}
