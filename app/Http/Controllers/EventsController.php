<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

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
        //$event= Event::select('title','description','events_date')->find(1);
        $event=Event::all()->sortBy('events_date');
        return view('pages.evenement')->withEvent($event);

    }
    public function indexN()
    {
        //$event= Event::select('title','description','events_date')->find(1);
        $event=Event::all()->sortBy('title');
        return view('pages.evenement')->withEvent($event);

    }
}
