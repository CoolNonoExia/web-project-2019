<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggestion_box;
use App\Vote;
use Illuminate\Support\Facades\DB;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Suggestion_box::all();

        /*$like = DB::table('votes')
            ->count('vote')
            ->where('vote', '=', true)
            ->get();

        $dislike = DB::table('votes')
            ->count('vote')
            ->where('vote', '=', false)
            ->get();*/

        if(AuthController::isConnected())
        {
            return view('pages.idea', ['ideas' => $ideas]);
        }
        return redirect()->route('home');
    }
}
