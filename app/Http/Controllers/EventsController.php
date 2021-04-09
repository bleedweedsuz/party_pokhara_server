<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function index(){
        $eventList = Event::orderBy("id", "DESC")->get();
        return view("layouts.events", ["eventList" => $eventList]);
    }

    function eventFeature(Request $request){
        $id = $request->id;
        $state = ($request->state == "true")?1:0;
        $eventUpdate = Event::where("id", $id)->update(["feature" => $state]);
        if($eventUpdate){ return response()->json(["status" => 200, "content" => "Event Feature Updated"]); }
        else { return response()->json(["status" => 400, "content" => "Server error."]); }
    }

    function eventBanner(Request $request){
        $id = $request->id;
        $state = ($request->state == "true")?1:0;
        $eventUpdate = Event::where("id", $id)->update(["banner" => $state]);
        if($eventUpdate){ return response()->json(["status" => 200, "content" => "Event Banner Updated"]); }
        else { return response()->json(["status" => 400, "content" => "Server error."]); }
    }
}