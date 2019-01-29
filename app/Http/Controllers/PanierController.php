<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PanierController extends Controller
{
    public function index()
    {
        //setcookie('panier', 1);
//        $panier = session('panier');
        if(isset($_COOKIE['panier']))
        {
            $panier = $_COOKIE['panier'];
            $products = Product::all()->where('id', '=', $panier);
        } else {
            $products = Product::all();
        }

//        $products = Product::all()->where('id', '=', session('idpro'));

        return view('pages.panier',['products' => $products]);
    }
}
