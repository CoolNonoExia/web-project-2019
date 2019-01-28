<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRegisterRequest;
use App\Http\Requests\AuthLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Checks if user is connected
    public static function isConnected()
    {
        return session()->has('logged_in') && session('logged_in');
    }

    private function login($id, $first_name, $role)
    {
        session()->put('logged_in', true);
        session()->put('id', $id);
        session()->put('first_name', $first_name);
        session()->put('role', $role);
    }

    public function logout()
    {
        session()->put('logged_in', false);
        session()->forget('id');
        session()->forget('first_name');
        session()->forget('role');

        return redirect()->route('home');
    }

    public function getRegistrationForm()
    {
        // If user is already connected, redirects back to home
        if($this::isConnected())
        {
            return redirect()->route('home');
        }

        $client = new \GuzzleHttp\Client();
        $campuses = $client->get('http://localhost:3000/campuses');
        $campuses = json_decode($campuses->getBody()->getContents(), true);

        return view('auth.register', ['campuses' => $campuses]);
    }

    public function postRegistrationForm(AuthRegisterRequest $request)
    {
        $client = new \GuzzleHttp\Client();
        $data = $request->all();

        $users = $client->get('http://localhost:3000/users');
        $users = json_decode($users->getBody()->getContents(), true);

        // Checks if this email is already used
        foreach($users as $user)
        {
            if($data['email'] == $user['email'])
            {
                return redirect()->route('register')->with('register_fail', 'Adresse e-mail déjà utilisée')->with('data', $data);
            }
        }

        // Adds entry to database
        $new_user = $client->request('POST', 'http://localhost:3000/users', [
            'form_params' => [
                'last_name' => $data['last_name'],
                'first_name' => $data['first_name'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                'id_campus' => $data['id_campus'],
                'id_role' => 1,
            ]
        ]);
        $new_user = json_decode($new_user->getBody()->getContents(), true)[0];

        // Logs the new comer in
        $this->login($new_user['id'], $new_user['first_name'], $new_user['id_role']);

        return redirect()->route('home');
    }

    public function getLoginForm()
    {
        // If user is already connected, redirects back to home
        if($this::isConnected())
        {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    public function postLoginForm(AuthLoginRequest $request)
    {
        $client = new \GuzzleHttp\Client();
        $data = $request->all();

        $users = $client->get('http://localhost:3000/users');
        $users = json_decode($users->getBody()->getContents(), true);

        // Checks if this email exists
        $exists = false;
        foreach($users as $user) {
            if ($data['email'] == $user['email']) {
                $exists = true;
                break;
            }
        }

        if(!$exists)
        {
            return redirect()->route('login')->with('login_fail', 'Aucun compte n\'a été trouvé avec cette adresse e-mail')->with('data', $data);
        }

        $user_data = $client->get('http://localhost:3000/users/' . $data['email']);
        $user_data = json_decode($user_data->getBody()->getContents(), true)[0];

        if (password_verify($data['password'], $user_data['password']))
        {
            $this->login($user_data['id'], $user_data['first_name'], $user_data['id_role']);

            return redirect()->route('home');
        }
        return redirect()->route('login')->with('login_fail', 'Connexion échouée, vérifiez votre e-mail et votre mot de passe')->with('data', $data);
    }
}
