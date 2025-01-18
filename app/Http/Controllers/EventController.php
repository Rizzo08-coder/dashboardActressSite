<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function listEvent(){
        $dl = new DataLayer();
        $future_event_list = $dl->getFutureEventList();
        $past_event_list = $dl->getPastEventList();
        return view('event', compact('future_event_list', 'past_event_list'));
    }
}
