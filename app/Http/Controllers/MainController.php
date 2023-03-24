<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function returnHomePage(){
        return view("homepage");
    }
    public function returnDashboard(){
        return view("dashboard");
    }
}