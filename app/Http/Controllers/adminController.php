<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    //
    public function dashboard(){
        return view('Dashboard.admin');
    }
    //AdminList
    public function adminList(){
        $data = User::get();
        return view('adminDashboard.adminList', compact('data'));
    }
    public function adminAdd(){
        return view('adminDashboard.adminAdd');
    }
    public function adminAddPost(Request $request){
        $data=$this->requestData($request);
        User::create($data);
        return redirect('admin/list')->with('success', "Admin Add Successfully.");
    }
    public function adminEdit($id){
         $page = User::where('id',$id)->first();
        return view('adminDashboard.adminEdit', compact('page'));
    }
    public function adminEditPost(Request $request , $id){
        $data=$this->requestData($request);

        User::where('id',$id)->update($data);

        return redirect('admin/list')->with('success', "Update Successfully.");
    }
    public function adminDelete($id){
        User::where('id',$id)->delete();
        return redirect()->back()->with('success' , "Data deleted");
    }
    private function requestData($request){
        return[

                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),


        ];
    }
}
