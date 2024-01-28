<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassModelController;
use App\Http\Controllers\parentController;
use App\Http\Controllers\schoolController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\SubjectController;
use App\Models\classModel;
use Illuminate\Support\Facades\Route;
use PHPUnit\Event\Code\ClassMethod;

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
    Route::get('list',[adminController::class , 'adminList']);
    Route::get('add',[adminController::class , 'adminAdd']);
    Route::post('addPost',[adminController::class , 'adminAddPost']);
    Route::get('edit/{id}',[adminController::class , 'adminEdit'])->name('edit');
    Route::post('postEdit/{id}',[adminController::class , 'adminEditPost']);
    Route::get('delete/{id}' , [adminController::class, 'adminDelete']);
    Route::get('searchAdmin',[adminController::class, 'searchAdmin'])->name('adminSearch');
    //Class
    Route::get('classList',[ClassModelController::class,'classList']);
    Route::get('classAdd',[ClassModelController::class,'classAdd']);
    Route::post('classAddPost',[ClassModelController::class,'classAddPost']);
    Route::get('classEdit/{id}',[ClassModelController::class , 'classEdit']);
    Route::post('classEditPost/{id}',[ClassModelController::class , 'classEditPost']);
    Route::get('classDelete/{id}' , [ClassModelController::class, 'classDelete']);
    Route::get('search',[ClassModelController::class, 'searchData'])->name('classSearch');
    //Subject
    Route::get('subjectList',[SubjectController::class,'subjectList']);
    Route::get('subjectAdd',[SubjectController::class,'subjectAdd']);
    Route::post('subjectAddPost',[SubjectController::class,'subjectAddPost']);
    Route::get('subjectEdit/{id}',[SubjectController::class , 'subjectEdit']);
    Route::post('subjectEditPost/{id}',[SubjectController::class , 'subjectEditPost']);
    Route::get('subjectDelete/{id}' , [SubjectController::class, 'subjectDelete']);
    Route::get('subjectSearch',[SubjectController::class, 'searchData'])->name('subjectSearch');


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

