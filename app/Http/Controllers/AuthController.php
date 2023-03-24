<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function changeAuthStatus(){
        if(auth()->check()){
            $user = auth()->user();
            Auth::logout();
            return redirect('/');
        }   
        else {
            return redirect('/register');
        } 
    }
}
