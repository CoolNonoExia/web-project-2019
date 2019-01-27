<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    //TODO: Delete this later (test)
    public function testpost()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://localhost:3000/users', [
            'form_params' => [
                'last_name' => 'krunal',
                'first_name' => 'krunal',
                'email' => 'krunal',
                'password' => 'krunal',
                'id_role' => 'krunal',
                'id_campus' => 'krunal',
            ]
        ]);
        $response = $response->getBody()->getContents();
        echo '<pre>';
        print_r($response);
    }
    public function testget()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost:3000/test');
        $response = $request->getBody()->getContents();
        echo '<pre>';
        print_r($response);
    }
}
