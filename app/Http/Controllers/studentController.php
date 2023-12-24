<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{
    //
    public function dashboard(){
        return view('adminDashboard.admin');
    }
}
