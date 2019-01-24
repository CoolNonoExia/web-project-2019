<?php

namespace App\Http\Controllers;

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
        $events = EventModel::all()->sortBy('events_date');

        return view('pages.evenement')->with('events', $events);//, ['events' => $events]);
    }

    public function indexN()
    {
        //$events = EventModel::select('title','description','events_date')->find(1);
        $events = EventModel::all()->sortBy('title');
        return view('pages.evenement')->with('events', $events);
    }
}
