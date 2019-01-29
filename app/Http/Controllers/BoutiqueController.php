<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductAddRequest;
use App\User;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Image_products;
use App\Order;
use Illuminate\Support\Facades\DB;

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
        $carousel= DB::table('orders')

            ->Selectraw('id_products, SUM(quantity) AS q')
            ->groupBy('id_products')
            ->orderByDesc('q')
            ->LIMIT(3)
            ->get();
        $carousel=json_decode($carousel, true);
        $check="checked";
        $uncheck="";
        $tri = 0;
        $active=true;
        if($id == 1)
        {
            $products=Product::all()->sortBy('name');

            $name="Selected";
            $price="";
            return view('pages.boutique', ['products' => $products, 'name' => $name, 'price' => $price, 'categories' => $categories, 'check' => $check,'uncheck' => $uncheck, 'tri' => $tri,'imgs' => $imgs, 'carousel' => $carousel, 'active' => $active]);
        }if ($id ==2)
        {

            $products=Product::all()->sortBy('price');
            $name="";
            $price="Selected";
            return view('pages.boutique', ['products' => $products, 'name' => $name, 'price' => $price, 'categories' => $categories, 'check' => $check,'uncheck' => $uncheck, 'tri' => $tri,'imgs' => $imgs, 'carousel' => $carousel, 'active' => $active]);
        }

    }

    public function articles($tri)
    {
            $imgs=Image_products::all();
            $carousel= "";
            $products = Product::all()->where('id_categories', '=', $tri);
            $check="checked";
            $uncheck="";
            $active=true;
            $categories = Category::all();
            /*$product=Product::all()->sortBy('price');*/
            $name = "";
            $price = "Selected";
            return view('pages.boutique', ['products' => $products, 'name' => $name, 'price' => $price, 'categories' => $categories, 'check' => $check,'uncheck' => $uncheck, 'tri' => $tri,'imgs' => $imgs, 'carousel' => $carousel, 'active' => $active]);

    }

    public function index()
    {

        $imgs=Image_products::all();
        $carousel= DB::table('orders')

            ->Selectraw('id_products, SUM(quantity) AS q')
            ->groupBy('id_products')
            ->orderByDesc('q')
            ->LIMIT(3)
            ->get();
        $carousel=json_decode($carousel, true);
        $active=true;
        /*Requête SQL pour le carousel ! SELECT id_products, SUM(quantity) AS q FROM `orders` GROUP BY id_products ORDER BY q DESC LIMIT 3 */
        $tri = 0;
        $product=Product::all()->sortBy('name');
        $categories=Category::all();
        $check="checked";
        $uncheck="";
        $name="Selected";
        $price="";
        return view('pages.boutique', ['products' => $product, 'name' => $name, 'price' => $price, 'categories' => $categories,'check' => $check, 'uncheck' => $uncheck, 'tri' => $tri, 'imgs' => $imgs, 'carousel' => $carousel, 'active' => $active]);
    }


    public function addPanier()
    {
        if(isset($_COOKIE['panier']))
        {
            $panier = unserialize($_COOKIE['panier'], ['allowed_classes' => false]);
        }
        else
        {
            $panier = array();
        }

        $panier = (array)$panier;
        $added = json_decode($_POST['id_pro'], true);

        $already = false;
        $i = 0;
        $c = 0;
        foreach($panier as $p)
        {
            if($p['id'] == $added){
                $already = true;
                $c = $i;
            }
            $i++;
        }

        if($already)
        {
            $panier[$c]['quantity']++;
        }
        else
        {
            $panier[count($panier)] = ['id' => $added, 'quantity' => 1];
        }

        setcookie('panier', serialize($panier), time()+60*60*24*7, '/');

        return json_encode('success');
    }

    public function getProduct()
    {
        if(!AuthController::isConnected() || session('role') !== 2)
        {
            return redirect()->route('home');
        }

        return view('pages.boutiqueAdd');
    }

    public function addProduct(ProductAddRequest $request)
    {
        $product = new Product;
        $img = new Image_products;

        $extension = explode('.', $request->image->getClientOriginalName());

        $img->title = $request->name;
        $img->ext = end($extension);


        $img->save();

        $request->image->storeAs('public/img/products', $img->id . '.' . $img->ext);

        $product->name = $request->name;
        $product->description = $request->desc;
        $product->price = $request->price;
        $product->in_stock = 1;
        $product->id_categories = $request->cat;
        $product->id_images_products = $img->id;

        $product->save();

        return redirect()->route('boutique');
    }
}
