<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PanierController extends Controller
{
    public function index()
    {
        if(!AuthController::isConnected())
        {
            return redirect()->route('home');
        }

        if(isset($_COOKIE['panier']))
        {
            $panier = unserialize($_COOKIE['panier'], ['allowed_classes' => false]);

            $list = array();

            foreach($panier as $p)
            {
                array_push($list, ['product' => Product::find($p['id']), 'quantity' => $p['quantity']]);
            }
        } else {
            $list = [];
        }

        return view('pages.panier',['products' => $list]);
    }

    public function remove()
    {
        $panier = unserialize($_COOKIE['panier'], ['allowed_classes' => false]);

        $id = json_decode($_POST['id_pro'], true);
        $i = 0;
        $c = 0;
        foreach($panier as $p)
        {
            if($p['id'] == $id)
            {
                $c = $i;
            }
            $i++;
        }

        unset($panier[$c]);

        setcookie('panier', serialize($panier), time()+60*60*24*7, '/');

        return json_encode('success');
    }

    public function changeQuantity()
    {
        $panier = unserialize($_COOKIE['panier'], ['allowed_classes' => false]);

        $id = json_decode($_POST['id_pro'], true);
        $new_value = json_decode($_POST['value'], true);
        $i = 0;
        $c = 0;
        foreach($panier as $p)
        {
            if($p['id'] == $id)
            {
                $c = $i;
            }
            $i++;
        }

        if($new_value > 0)
        {
            $panier[$c]['quantity'] = $new_value;
        }
        else
        {
            unset($panier[$c]);
        }

        setcookie('panier', serialize($panier), time()+60*60*24*7, '/');

        return json_encode('success');
    }
}
