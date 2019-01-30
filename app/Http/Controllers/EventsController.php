<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\EventAddRequest;
use App\Http\Requests\CommentAddRequest;
use App\Http\Requests\RegistrationAddRequest;
use App\Http\Requests\VoteAddRequest;
use App\Image_events;
use DateTime;
use Illuminate\Http\Request;
use App\EventModel;
use App\Comment;
use App\Registration;
use App\Like;
use Illuminate\Support\Facades\DB;
use function Sodium\increment;


class EventsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = EventModel::all()->where('events_date', '>', date('Y-m-d h:i:s', time()))->sortBy('events_date');
        $pastevents = EventModel::all()->where('events_date', '<', date('Y-m-d h:i:s', time()))->sortBy('events_date');;
        $imgs = Image_events::all();

        $regist = Registration::all()->where('id_user', '=', session('id'));

        foreach($events as $event)
        {
            $registered = false;
            foreach($regist as $reg)
            {
                if($reg['id_events'] == $event['id'])
                {
                    $registered = true;
                }
            }
            $event['registered'] = $registered;
        }

        $date="Seclected";
        $check="checked=\"checked\"";
        $name="";
        return view('pages.evenement',['events' => $events,'pastevents'=>$pastevents,'imgs'=> $imgs,'date' =>$date, 'name' => $name, 'check' => $check, 'registration' => $regist ]);
    }

    public function indexN()
    {
        $events = EventModel::all()->where('events_date', '>', date('Y-m-d h:i:s', time()))->sortBy('title');
        $pastevents = EventModel::all()->where('events_date', '<', date('Y-m-d h:i:s', time()))->sortBy('title');;
        $imgs = Image_events::all();
        $check="checked";
        $date="";
        $name="Selected";
        return view('pages.evenement',['events' => $events,'pastevents'=>$pastevents,'imgs'=> $imgs,'date' =>$date, 'name' => $name, 'check' => $check ]);
    }

    public function Past()
    {
        $events = EventModel::all()->where('events_date', '>', date('Y-m-d h:i:s', time()))->sortBy('title');
        $pastevents = "";
        $check="";
        $imgs = Image_events::all();
        $date="Seclected";
        $name="";
        return view('pages.evenement',['events' => $events,'pastevents'=>$pastevents,'imgs'=> $imgs,'date' =>$date, 'name' => $name, 'check' => $check ]);
    }

    public function Like($id)
    {
        $client = new \GuzzleHttp\Client();

        $events = EventModel::all()->where('id', '=', $id);
        $imgs = Image_events::all();
        $comments = Comment::all()->where('id_events', '=', $id);
        $likes = Like::all()->where('id_user','=', session('id'));
        $users = array();

        foreach($comments as $comment)
        {
            $getreq = $client->get('http://localhost:3000/users/' . $comment['id_user']);
            $user = json_decode($getreq->getBody()->getContents(), true);
            array_push($users, count($user) > 0 ? $user[0] : ['last_name' => 'Utilisateur supprimé', 'first_name' => '']);
        }



        foreach($events as $event)
        {
            $vote = false;
            foreach($likes as $like)
            {
                if($like['id_events'] == $event['id'])
                {
                    $vote = true;
                }
            }
            $event['vote'] = $vote;
        }

        return view('pages.eventLike',['events' => $events, 'imgs' => $imgs, 'comments' => $comments, 'users' => $users, 'likes' => $likes]);
    }

    public function getAdd()
    {
        if(!AuthController::isConnected() || session('role') !== 2)
        {
            return redirect()->route('home');
        }

        return view('pages.eventAdd');
    }
    public function postAdd(EventAddRequest $request)
    {
        $event = new EventModel;
        $img = new Image_events;

        $extension = explode('.', $request->image->getClientOriginalName());

        $img->title = $request->title;
        $img->ext = end($extension);
        $img->is_presentation = true;

        $img->save();

        $request->image->storeAs('public/img/events', $img->id . '.' . $img->ext);

        $event->title = $request->title;
        $event->description = $request->desc;
        $event->events_date = $request->date;
        $event->post_date = new DateTime();
        $event->is_recurrent = $request->has('recurrent');
        $event->is_free = !$request->has('free');
        $event->likes_number = 0;
        $event->comments_number = 0;
        $event->id_images_events = $img->id;

        $event->save();

        return redirect()->route('eve');
    }

    public function postComAdd(CommentAddRequest $request, $id)
    {
        $comments = new Comment;

        $comments->id_user = session('id');
        $comments->id_events = $id ;
        $comments->comment = $request->desc;

        $comments->save();

        return redirect()->route('eveL', $id);
    }


    public function postRegister(RegistrationAddRequest $request, $id)
    {
        $regist = new Registration;

        $regist->id_user = session('id');
        $regist->id_events = $id ;

        $regist->save();

        return redirect()->route('eve');
    }

    public function postVote(VoteAddRequest $request, $id)
    {
        $like = EventModel::all()->where('id','=',$id)->first();
        unset($like->connection);
        $like->likes_number = $like->likes_number + 1;

        $like->save();


        $vote = new Like;

        $vote->id_user = session('id');
        $vote->id_events = $id;
        $vote->save();

        return redirect()->route('eveL', $id);
    }

}
