<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image_events;
use Illuminate\Http\Request;
use App\EventModel;

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
        $name="";
        return view('pages.evenement', ['events' => $events,'pastevents'=>$pastevents,'imgs'=> $imgs,'date' =>$date, 'name' => $name ]);
    }

    public function indexN()
    {
        $events = EventModel::all()->where('events_date', '>', date('Y-m-d h:i:s', time()))->sortBy('title');
        $pastevents = EventModel::all()->where('events_date', '<', date('Y-m-d h:i:s', time()))->sortBy('title');;
        $imgs = Image_events::all();

        $date="";
        $name="Selected";
        return view('pages.evenement',['events' => $events,'pastevents'=>$pastevents,'imgs'=> $imgs,'date' =>$date, 'name' => $name ]);
    }
}
