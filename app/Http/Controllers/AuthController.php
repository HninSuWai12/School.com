<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\forgetPasswordMail;
use App\Mail\forgetPasswordEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //
    public function dashboard(){
        if(!empty(Auth::check())){
            if(Auth::user()->user_type == 1){
                return view('adminDashboard.admin');
            }elseif (Auth::user()->user_type == 2) {
                return view('parentDashboard.dashboard');
            }elseif (Auth::user()->user_type == 3) {
                return view('studentDashboard.dashboard');
            }elseif (Auth::user()->user_type == 4) {
                return view('schoolDashboard.dashboard');
            }
        }

        return view('AuthDashboard.login');
    }
    public function login(Request $request){
        $remember = !empty($request->remember) ? true : false;

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password] , $remember)){
            if(Auth::user()->user_type == 1){
                return redirect()->route('dashboard');
            }elseif (Auth::user()->user_type == 2) {
                return redirect(url('parent/dashboard'));
            }elseif (Auth::user()->user_type == 3) {
                return redirect(url('student/dashboard'));
            }elseif (Auth::user()->user_type == 4) {
                return redirect(url('school/dashboard'));
            }
        }else{
            return redirect()->back()->with('error', 'Please enter current email and password');
        }
    }
    public function forgetPassword(){
        return view('AuthDashboard.forgotPassword');
    }
    public function postForgetPassword(Request $request){

        $user = User::getEmailSingle($request->email);
        if(!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgetPasswordEmail($user));
            return redirect()->back()->with('success', 'Please check your email for password reset instructions.');


        }else{
            return redirect()->back()->with('error', 'Email not found in this system.');

        }

    }
    public function reset($remember_token){
        $user = User::getTokenSingle($remember_token);
           if(!empty($user)){
            $data['token'] = $user->remember_token;
            return view('AuthDashboard.resetPassword' , $data);

           }else{
            abort(404);
           }

    }
    public function postReset($token , Request $request){
        if($request->password == $request->cpassword){
            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();
            return redirect(url(''))->with('success', "Password successfully change");

        }else{
            return redirect()->back()->with('error' , "Password and confirmPassword does not match");
        }
    }
    public function logout(){
        Auth::logout();
        return redirect(url(''));
    }
}
