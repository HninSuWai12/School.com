<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class schoolController extends Controller
{
    //
    public function dashboard(){
        return view('adminDashboard.admin');
    }
}
