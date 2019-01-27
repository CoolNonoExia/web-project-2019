<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getRegistrationForm()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost:3000/campuses');
        $campuses = $request->getBody()->getContents();

        return view('auth.register', ['campuses' => json_decode($campuses, true)]);
    }

    public function postRegistrationForm(AuthRequest $request)
    {
        $client = new \GuzzleHttp\Client();
        $data = $request->all();
        $client->request('POST', 'http://localhost:3000/users', [
            'form_params' => [
                'last_name' => $data['last_name'],
                'first_name' => $data['first_name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'id_campus' => $data['id_campus'],
                'id_role' => 1,
            ]
        ]);

        return redirect()->route('home');
    }

    public function getLoginForm()
    {
        return view('auth.login');
    }

    public function postLoginForm()
    {
        return;
    }
}
