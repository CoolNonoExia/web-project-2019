<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\EventAddRequest;
use App\Image_events;
use DateTime;
use Illuminate\Http\Request;
use App\EventModel;
use App\Comment;

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
        $date="Seclected";
        $check="checked=\"checked\"";
        $name="";
        return view('pages.evenement',['events' => $events,'pastevents'=>$pastevents,'imgs'=> $imgs,'date' =>$date, 'name' => $name, 'check' => $check ]);
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
        $comment= Comment::all()->where('id_events', '=', $id);
        $events = EventModel::all()->where('id', '=', $id);
        $imgs = Image_events::all();
        return view('pages.eventLike',['events' => $events, 'imgs' => $imgs, 'comments' => $comment]);
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
}
