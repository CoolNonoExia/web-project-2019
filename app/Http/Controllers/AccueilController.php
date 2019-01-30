<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventModel;
use App\Image_events;

class AccueilController extends Controller
{
    public function index()
    {
        $events = EventModel::all()->where('events_date', '>', date('Y-m-d h:i:s', time()))->sortBy('title');
        $imgs = Image_events::all();
        $active = true;
        
        return view('pages.home',['events' => $events,'imgs'=> $imgs, 'active'=>$active]);
    }
}
