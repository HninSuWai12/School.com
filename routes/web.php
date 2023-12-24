<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\parentController;
use App\Http\Controllers\schoolController;
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
 //Auth
 Route::get('/', [AuthController::class , 'dashboard'])->name('loginDashboard');
 Route::post('login',[AuthController::class , 'login'])->name('login');
 Route::get('logout', [AuthController::class , 'logout'])->name('logout');
 Route::get('forgetPassword',[AuthController::class , 'forgetPassword'])->name('forget');
 Route::post('forgetPassword',[AuthController::class, 'postForgetPassword'])->name('sendMail');
 Route::get('reset/{token}' , [AuthController::class , 'reset']);
 Route::post('reset/{token}' , [AuthController::class , 'postReset'])->name('reset');

//Admin
Route::group(['prefix'=>'admin' , 'middleware'=> 'admin'] , function(){
    Route::get('dashboard' , [adminController::class , 'dashboard'])->name('dashboard');

});

//Parent
Route::group(['prefix'=>'parent' , 'middleware'=> 'parent'] , function(){
    Route::get('dashboard' , [parentController::class, 'dashboard']);

});

//Student
Route::group(['prefix'=>'student' , 'middleware'=> 'student'] , function(){
    Route::get('dashboard' , [studentController::class , 'dashboard']);

});
//School

Route::group(['prefix'=>'school' , 'middleware'=> 'school'] , function(){
    Route::get('dashboard' , [schoolController::class , 'dashboard']);

});

