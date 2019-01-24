<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class BoutiqueController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product=Product::all()->sortBy('name');
        $name="Selected";
        $price="";
        return view('pages.boutique', ['product' => $product, 'name' => $name, 'price' => $price]);
    }

    public function indexP()
    {
        $product=Product::all()->sortBy('price');
        $name="";
        $price="Selected";
        return view('pages.boutique', ['product' => $product, 'name' => $name, 'price' => $price]);
    }
}
