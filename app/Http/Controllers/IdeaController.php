<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use App\Http\Requests\IdeaAddRequest;
use App\Suggestion_box;
use App\Image_events;
use App\Vote;
use Illuminate\Support\Facades\DB;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas=Suggestion_box::all();

        if(AuthController::isConnected())
        {
            return view('pages.idea', ['ideas' => $ideas]);
        }
        return redirect()->route('home');
    }

    public function getAdd()
    {
        $ideas=Suggestion_box::all();

        if(AuthController::isConnected())
        {
            return view('pages.idea', ['ideas' => $ideas]);
        }
        return redirect()->route('home');

    }


    public function postAdd(IdeaAddRequest $request)
    {
        $idea = new Suggestion_box;
        $img = new Image_events;

        $extension = explode('.', $request->image->getClientOriginalName());

        $img->title = $request->title;
        $img->ext = end($extension);
        $img->is_presentation = true;

        $img->save();

        $request->image->storeAs('public/img/ideas', $img->id . '.' . $img->ext);

        $idea->title = $request->title;
        $idea->description = $request->desc;
        $idea->post_date = new DateTime();
        $idea->votes_number = 0;
        $idea->unvotes_number = 0;
        $idea->id_images_events = $img->id;
        $idea->id_user = 3;

        $idea->save();

        return redirect()->route('idea');
    }
}
