<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index()
    {
        if(AuthController::isConnected())
        {
            return view('pages.idea');
        }
        return redirect()->route('home');
    }
    public function idea  ()
    {
        $title=idea::all()->sortBy('post_date');
        $name="";
        $price="Selected";
        return view('pages.idea', ['title' => $title, 'name' => $name, 'price' => $price]);
    }
}
