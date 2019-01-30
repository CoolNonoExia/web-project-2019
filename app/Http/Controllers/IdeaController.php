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
        if(!AuthController::isConnected())
        {
            return redirect()->route('home');
        }

        $client = new \GuzzleHttp\Client();
        $ideas = Suggestion_box::all();
        $imgs = Image_events::all();
        $votes = Vote::all()->where('id_user','=',session('id'));
        $users = array();

        foreach($ideas as $idea)
        {
            $getreq = $client->get('http://localhost:3000/users/' . $idea['id_user']);
            $user = json_decode($getreq->getBody()->getContents(), true);
            array_push($users, count($user) > 0 ? $user[0] : ['last_name' => 'Utilisateur supprimé', 'first_name' => '']);

            $like = false;
            $dislike = false;

            foreach($votes as $vote)
            {
                if($vote['id_suggestion_box'] == $idea['id'] && $vote['vote'])
                {
                    $like = true;
                }
                if($vote['id_suggestion_box'] == $idea['id'] && !$vote['vote']){

                    $dislike = true;
                }
            }
            $idea['like'] = $like;
            $idea['dislike'] = $dislike;
        }

        $ideas2D = array();
        $rows = ceil(count($ideas)/2);
        $c = 0;

        for($i = 0; $i < $rows; $i++)
        {
            $ideas2D[$i] = array();
            for($j = 0; $j < 4; $j++)
            {
                $ideas2D[$i][$j] = $c < count($ideas) ? $ideas[$c] : null;
                $c++;
            }
        }

        return view('pages.idea', ['ideas' => $ideas2D, 'imgs' => $imgs, 'likes' => $votes, 'users' => $users]);
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
