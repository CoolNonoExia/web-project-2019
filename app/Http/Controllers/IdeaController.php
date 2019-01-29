<?php

namespace App\Http\Controllers;

use App\Http\Requests\DislikeAddRequest;
use App\Http\Requests\LikeAddRequest;
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
        $client = new \GuzzleHttp\Client();
        $ideas = Suggestion_box::all();
        $likes = Vote::all()->where('id_user','=',session('id'));
        $users = array();
        $i = 0;

        foreach($ideas as $idea)
        {
            $getreq = $client->get('http://localhost:3000/users/' . 2); //$comment['id_user']
            array_push($users, json_decode($getreq->getBody()->getContents(), true)[0]);
            $i++;
        }


        foreach($ideas as $idea)
        {
            $vote = false;
            $dislike = false;
            foreach($likes as $like)
            {
                if($like['id_suggestion_box'] == $idea['id'] && $like['vote']==1)
                {
                    $vote = true;
                }if($like['id_suggestion_box'] == $idea['id'] && $like['vote']==0){

                    $dislike = true;
                }
            }
            $idea['like'] = $vote;
            $idea['dislike'] = $dislike;
        }

        if(AuthController::isConnected())
        {
            return view('pages.idea', ['ideas' => $ideas, 'likes' => $likes,'users' => $users]);
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
        $idea->id_user = session('id');

        $idea->save();

        return redirect()->route('idea');
    }

    public function postLike(LikeAddRequest $request, $id)
    {
        $like = Suggestion_box::all()->where('id','=',$id)->first();
        unset($like->connection);
        $like->votes_number = $like->votes_number + 1;

        $like->save();


        $vote = new Vote;

        $vote->id_user = session('id');
        $vote->id_suggestion_box = $id;
        $vote->vote =1;
        $vote->save();

        return redirect()->route('idea');
    }

    public function postDislike(DislikeAddRequest $request, $id)
    {
        $like = Suggestion_box::all()->where('id','=',$id)->first();
        unset($like->connection);
        $like->unvotes_number = $like->unvotes_number + 1;

        $like->save();


        $vote = new Vote;

        $vote->id_user = session('id');
        $vote->id_suggestion_box = $id;
        $vote->vote =0;
        $vote->save();

        return redirect()->route('idea');
    }
}
