<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [DashboardController::class, "index"])->name("dashboard");

Route::get("/events", [EventsController::class, "index"])->name("events");
Route::post("/events-feature", [EventsController::class, "eventFeature"])->name("events-feature");
Route::post("/events-banner", [EventsController::class, "eventBanner"])->name("events-banner");

Route::get("/register-users", [RegisterUserController::class, "index"])->name("register-users");

Route::get("/profile", [ProfileController::class, "index"])->name("profile");
Route::post("/profile-update", [ProfileController::class, "updateProfile"])->name("profile-update");
Route::post("/profile-update-password", [ProfileController::class, "updateProfilePassword"])->name("profile-update-password");

require __DIR__.'/auth.php';
