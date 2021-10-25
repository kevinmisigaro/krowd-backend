<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(){
        $events = Event::get();
        return \response()->json($events, 200);
    }

    public function store(){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'entrance_fee' => 'required',
            'alcohol_price' => 'required',
            'club_id' => 'required',
            'description' => 'required'
        ]);

        Event::create([
            'name' => $request->name,
            'entrance_fee' => $request->entrance_fee,
            'alcohol_price' => $request->alcohol_price,
            'club_id' => $request->club_id,
            'description' => $request->description
        ]);

        return response()->json('Event added', 201);
    }

    public function attend(Request $request){
        
    }

    
    
}
