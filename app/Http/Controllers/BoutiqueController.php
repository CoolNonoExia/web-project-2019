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
        $product=Product::all();
        return view('pages.boutique', ['product' => $product]);
    }
}
