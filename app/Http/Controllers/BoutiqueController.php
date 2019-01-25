<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Image_products;

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
        $imgs=Image_products::all();
        if($id == 1)
        {
            $product=Product::all()->sortBy('name');

            $name="Selected";
            $price="";
            return view('pages.boutique', ['products' => $product, 'name' => $name, 'price' => $price, 'categories' => $categories, 'imgs' => $imgs]);
        }if ($id ==2)
        {
            $product=Product::all()->sortBy('price');
            $name="";
            $price="Selected";
            return view('pages.boutique', ['products' => $product, 'name' => $name, 'price' => $price, 'categories' => $categories, 'imgs' => $imgs]);
        }

    }

    public function articles($tri)
    {
            $imgs=Image_products::all();
            $products = Product::all()->where('id_categories', '=', $tri);
            $check="checked";
            $uncheck="";

            $categories = Category::all();
            /*$product=Product::all()->sortBy('price');*/
            $name = "";
            $price = "Selected";
            return view('pages.boutique', ['products' => $products, 'name' => $name, 'price' => $price, 'categories' => $categories, 'check' => $check,'uncheck' => $uncheck, 'tri' => $tri,'imgs' => $imgs]);

    }

    public function index(){

        $imgs=Image_products::all();
        $tri = 0;
        $product=Product::all()->sortBy('name');
        $categories=Category::all();
        $check="checked";
        $uncheck="";
        $name="Selected";
        $price="";
        return view('pages.boutique', ['products' => $product, 'name' => $name, 'price' => $price, 'categories' => $categories,'check' => $check, 'uncheck' => $uncheck, 'tri' => $tri, 'imgs' => $imgs]);
    }
}
