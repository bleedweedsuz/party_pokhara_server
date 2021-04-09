<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function index(){
        return view("layouts.profile");
    }

    function updateProfile(Request $request){
        $userInfo = Auth::user();
        $userInfo->name = $request->name;
        if($userInfo->save()){
            return back()->with('success-profile', 'Profile Info updated.');
        }
        else{
            return back()->withError('Server error');
        }
    }

    function updateProfilePassword(Request $request){
        $isValidate = $request->validate([
            'cpass' => ['required', 'string', 'min:8'],
            'pass' => ['required', 'string', 'min:8'],
            'rpass' => ['required', 'string', 'min:8'],
        ]);

        if($isValidate){
            $cpass = trim($request->cpass);
            $pass = trim($request->pass); $repass = trim($request->rpass);
            if($pass != $repass){ 
                return back()->withError('Retype password doesnot match.');
            }
            
            $userInfo = Auth::user();
            if(Hash::check($cpass, $userInfo->password)){
                $userInfo->password = Hash::make($pass);
                if($userInfo->save()){
                    return back()->with('success-password', 'Password updated');
                }
                else{
                    return back()->withError('Server error');
                }
            }
            else{
                return back()->withError('Old password doesnot match.');
            }
        }
    }

    function userLogin(Request $request){
        
    }
}
