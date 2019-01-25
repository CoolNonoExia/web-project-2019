<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

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
        $categories=Category::all();

        if($id == 1)
        {
            $product=Product::all()->sortBy('name');

            $name="Selected";
            $price="";
            return view('pages.boutique', ['product' => $product, 'name' => $name, 'price' => $price, 'categories' => $categories]);
        }if ($id ==2)
        {
            $product=Product::all()->sortBy('price');
            $name="";
            $price="Selected";
            return view('pages.boutique', ['product' => $product, 'name' => $name, 'price' => $price, 'categories' => $categories]);
        }

    }

    public function articles($tri)
    {

            $products = Product::all()->where('id_categories', '=', $tri);
            $check="checked";
            $uncheck="";

            $categories = Category::all();
            /*$product=Product::all()->sortBy('price');*/
            $name = "";
            $price = "Selected";
            return view('pages.boutique', ['product' => $products, 'name' => $name, 'price' => $price, 'categories' => $categories, 'check' => $check,'uncheck' => $uncheck, 'tri' => $tri]);

    }

    public function index(){
        $tri = 0;
        $product=Product::all()->sortBy('name');
        $categories=Category::all();
        $check="checked";
        $uncheck="";
        $name="Selected";
        $price="";
        return view('pages.boutique', ['product' => $product, 'name' => $name, 'price' => $price, 'categories' => $categories,'check' => $check, 'uncheck' => $uncheck, 'tri' => $tri]);
    }
}
