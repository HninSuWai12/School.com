<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function dashboard(){
        return view('Dashboard.admin');
    }
    //AdminList
    public function adminList(){
        return view('adminDashboard.adminList');
    }
    public function adminAdd(){
        return view('adminDashboard.adminAdd');
    }
    public function adminAddPost(Request $request){
        // $data=[
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>$request->password

        // ];
        // User::create($data);
        // return redirect(url('admin/list'));
    }
}
