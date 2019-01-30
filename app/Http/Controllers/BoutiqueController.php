<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryAddRequest;
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
    public function index(Request $request)
    {
        $qstrings = $request->all();

        $imgs = Image_products::all();
        $categories = Category::all();

        $carousels = DB::table('orders')
            ->join('products', 'orders.id_products', '=', 'products.id')
            ->selectRaw('orders.id_products, SUM(orders.quantity) AS q, products.id_images_products')
            ->groupBy('orders.id_products')
            ->orderByDesc('q')
            ->LIMIT(3)
            ->get();
        $carousels = json_decode($carousels, true);

        $active = true;
        $check = "checked";
        $uncheck = "";

        if(array_key_exists('sortBy', $qstrings))
        {
            if($qstrings['sortBy'] == 'price')
            {
                if(array_key_exists('sort', $qstrings))
                {
                    if($qstrings['sort'] == 'desc')
                    {
                        $products = Product::orderBy('price', 'desc')->get();
                        $name = "";
                        $price = "selected";
                        $asc = '';
                        $desc = 'selected';
                    }
                    else
                    {
                        $products = Product::orderBy('price', 'asc')->get();
                        $name = "";
                        $price = "selected";
                        $asc = 'selected';
                        $desc = '';
                    }
                }
            }
            else
            {
                if(array_key_exists('sort', $qstrings))
                {
                    if($qstrings['sort'] == 'desc')
                    {
                        $products = Product::orderBy('price', 'desc')->get();
                        $name = "selected";
                        $price = "";
                        $asc = '';
                        $desc = 'selected';
                    }
                    else
                    {
                        $products = Product::orderBy('price', 'asc')->get();
                        $name = "selected";
                        $price = "";
                        $asc = 'selected';
                        $desc = '';
                    }
                }
            }
        }
        else
        {
            $products = Product::orderBy('name', 'asc')->get();
            $name = "selected";
            $asc = 'selected';
            $desc = '';
            $price = "";
        }

        if(array_key_exists('cat', $qstrings))
        {
            $tri = $qstrings['cat'];

            if($tri != 0)
            {
                $products = Product::all()->where('id_categories', '=', $tri);
            }
        }
        else
        {
            $tri = 0;
        }

        $products2D = array();

        $i = 0;
        $j = 0;
        foreach($products as $product)
        {
            $products2D[$i][$j] = $product;
            $j++;

            if($j >= 4)
            {
                $j = 0;
                $i++;
                $products2D[$i] = array();
            }
        }

        return view('pages.boutique',
            ['products' => $products2D,
                'name' => $name,
                'price' => $price,
                'asc' => $asc,
                'desc' => $desc,
                'categories' => $categories,
                'check' => $check,
                'uncheck' => $uncheck,
                'tri' => $tri,
                'imgs' => $imgs,
                'carousels' => $carousels,
                'active' => $active]);
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

        $categories = Category::all();

        return view('pages.boutiqueAdd', ['cats' => $categories]);
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

    public function postCategory(CategoryAddRequest $request)
    {
        $cat = new Category;

        $cat->name = $request->cat;
        $cat->save();

        return redirect()->route('boutique');
    }
}
