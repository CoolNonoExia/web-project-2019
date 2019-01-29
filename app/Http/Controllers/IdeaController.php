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
        if(AuthController::isConnected())
        {
            $ideas = Suggestion_box::all();
            return view('pages.idea', ['ideas' => $ideas]);
        }
        return redirect()->route('home');
    }

    public function postAdd(IdeaAddRequest $request)
    {
        $idea = new Suggestion_box;
        if($request->image !== null)
        {
            $img = new Image_events;

            $extension = explode('.', $request->image->getClientOriginalName());

            $img->title = $request->title;
            $img->ext = end($extension);
            $img->is_presentation = true;

            $img->save();

            $request->image->storeAs('public/img/ideas', $img->id . '.' . $img->ext);

            $id_img = $img->id;
        } else {
            $id_img = 0;
        }

        $idea->title = $request->title;
        $idea->description = $request->desc;
        $idea->post_date = new DateTime();
        $idea->votes_number = 0;
        $idea->unvotes_number = 0;
        $idea->id_images_events = $id_img;
        $idea->id_user = 3;

        $idea->save();

        return redirect()->route('idea');
    }
}
