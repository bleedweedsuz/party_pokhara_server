<?php

namespace App\Http\Controllers;

use App\Models\AppUser;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function index(){
        $users = AppUser::orderBy("id", "DESC")->get();
        return view("layouts.register-users", ["users" => $users]);
    }
}
