<?php

namespace App\Http\Controllers;

use App\User;
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
    public function article($id)
    {
        if($id == 1)
        {
            $product=Product::all()->sortBy('name');
            $name="Selected";
            $price="";
            return view('pages.boutique', ['product' => $product, 'name' => $name, 'price' => $price]);
        }if ($id ==2)
        {
            $product=Product::all()->sortBy('price');
            $name="";
            $price="Selected";
            return view('pages.boutique', ['product' => $product, 'name' => $name, 'price' => $price]);
        }

    }

    public function articles()
    {
        $product=Product::all()->sortBy('price');
        $name="";
        $price="Selected";
        return view('pages.boutique', ['product' => $product, 'name' => $name, 'price' => $price]);
    }
}
