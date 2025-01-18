<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    public function listEvent(){
        $dl = new DataLayer();
        $future_event_list = $dl->getFutureEventList();
        $past_event_list = $dl->getPastEventList();
        return view('event', compact('future_event_list', 'past_event_list'));
    }

    public function addEvent(){
        $dl = new DataLayer();
        $show_list = $dl->getShowList();
        return view('addevent', compact('show_list'));
    }

    public function storeEvent(Request $request){
        $dl = new DataLayer();
        $place = $request->input('place');
        $show_id = $request->input('show');
        $date_string = $request->input('date');

        $data = DateTime::createFromFormat("d/m/Y", $date_string);
        $hour = $request->input('hour');

        $dl->storeEvent($place, $show_id, $data, $hour);
        return Redirect::route('event')->with('newEvent',true);

    }

    public function destroyEvent($id){
        $dl = new DataLayer();
        $event = $dl->getEventById($id);
        $dl->destroyEvent($event);
        return Redirect::route('event')->with('destroyedEvent',true);
    }
}
