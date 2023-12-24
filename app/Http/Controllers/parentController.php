<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class parentController extends Controller
{
    //
    public function dashboard(){
        return view('adminDashboard.admin');
    }
}
