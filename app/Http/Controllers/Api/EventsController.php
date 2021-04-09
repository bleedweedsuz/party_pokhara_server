<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventsController extends Controller
{
    function newEvent(Request $request){
        if($request->selectedImageFromEdit == false){
            $data = $request->image;
            $file = "images/banner-".Str::uuid()."-".time().".png";
            Storage::disk('public')->put($file, base64_decode($data));
        }
        
        //Save info second
        $edit = $request->edit;
        if($edit == "") $event = new Event();
        else $event = Event::where("id", $edit)->first();

        $event->firebase_token = $request->firebase_token;
        $event->title = $request->title;
        $event->startTime = $request->start;
        $event->endTime = $request->end;
        $event->entryFee = $request->fee;
        $event->lat = $request->lat;
        $event->long = $request->lng;
        $event->address = $request->venue;
        $event->description = $request->desc;
        $event->tags = $request->tags;
        if($request->selectedImageFromEdit == false){ $event->bannerImage = $file; }
        if($event->save()){
            if($edit == "") return response()->json(["status" => 200, "content" => "New Event created."]);
            else return response()->json(["status" => 201, "content" => "Event updated."]);
        }
        else return response()->json(["status" => 400, "content" => "Server error"]);
    }

    function myEventList(Request $request){
        $myEventList = Event::where("firebase_token", $request->token)->orderBy("id", "DESC")->get();
        return response()->json(["myEventList" => $myEventList]);
    }

    function delMyEvent(Request $request){
        $del = Event::where("id", $request->id)->delete();
        if($del) return response()->json(["status" => 200]);
        else return response()->json(["status" => 400]);
    }

    function allEventList(){
        return response()->json(["features" => $this->eventFeatureList(), "today" => $this->eventTodayLists(), "tomorrow" => $this->eventTomorrowList()]);
    }

    function eventFeatureList(){
        return Event::where("feature", true)->orderBy("id", "DESC")->get();
    }

    function eventTodayLists(){
        $start = date("Y-m-d").' 00:00:00';
        $end = date("Y-m-d").' 23:59:59';
        return Event::whereBetween('startTime', [$start, $end])->orderBy("id", "DESC")->get();
    }

    function eventTomorrowList(){
        $tomorrow = date('Y-m-d', strtotime(date("Y-m-d")."+ 1 days"));
        $start = $tomorrow.' 00:00:00';
        $end = $tomorrow.' 23:59:59';
        return Event::whereBetween('startTime', [$start, $end])->orderBy("id", "DESC")->get();
    }

    function explore(){
        return response()->json(["banner" => $this->banner(), "today" => $this->eventTodayLists()]);
    }

    function banner(){
        return Event::where("banner", true)->orderBy("id", "DESC")->get();
    }

    function venus(){
        $venus = Event::select("address")->groupBy("address")->orderBy("id", "DESC")->get();
        return response()->json(["venus" => $venus]);
    }

    function eventInVenus(Request $request){
        $venus = Event::where('address', $request->address)->orderBy("id", "DESC")->get();
        return response()->json(["events" => $venus]);
    }
}