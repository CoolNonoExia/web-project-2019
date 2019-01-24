<?php

namespace App\Http\Controllers;

use App\Image_events;
use Faker\Provider\DateTime as DateTime;
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

        return view('pages.evenement', ['events' => $events, 'pastevents' => $pastevents, 'imgs' => $imgs]);
    }

    public function indexN()
    {
        //$events = EventModel::select('title','description','events_date')->find(1);
        $events = EventModel::all()->sortBy('title');
        return view('pages.evenement')->with('events', $events);
    }
}
