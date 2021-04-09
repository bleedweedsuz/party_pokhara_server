<?php

use App\Http\Controllers\Api\EventsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/user-login', [ProfileController::class, "userLogin"]);
Route::get('/events', [EventsController::class, "allEventList"]);
Route::get('/explore', [EventsController::class, "explore"]);
Route::get('/venus', [EventsController::class, "venus"]);
Route::get('/event-in-venus', [EventsController::class, "eventInVenus"]);
Route::get('/my-events', [EventsController::class, "myEventList"]);
Route::get('/my-events-del', [EventsController::class, "delMyEvent"]);
Route::post('/new-event', [EventsController::class, "newEvent"]);