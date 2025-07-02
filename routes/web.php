<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',function(){
    return view('Home');
});

Route::get('/About',function(){
    return view('About');
});

Route::get('/Offer',function(){
    return view('Offer');
});

Route::get('/Team',[AdminController::class,'GetFaculties']);

Route::get('/Enroll',function(){
    return view('EnrollNow');
});

Route::get('/Signup',function(){
    return view('Signup');
});

Route::get('/Login',function(){
    return view('Login');
});


Route::get('/Contact',function(){
    return view('Contact');
});



// Now logic here


Route::post('SendContact',[ContactController::class,'CreateContact']);

// user Reigisterd Route


Route::post('UserRegisterd',[UsersController::class,'CreateUser']);
Route::post('Login',[UsersController::class,'LoginUser']);
Route::post('Logout',[UsersController::class,'Logout']);


// Enroll routes


Route::post('EnrollStudent',[EnrollController::class,'CreateEnroll']);



// Admin routes

Route::middleware(['only.admin'])->group(function () {
    Route::get('/Admin',function(){
    return view('Admin.AdminLogin');
    });


    Route::get('/AdminSignup',function(){
    return view('Admin.AdminSignup');
    });

    Route::get('/AddCourse',function(){
        return view('Admin.AddCourse');
    });

    Route::get('/GetAllStudents',[AdminController::class,'GetStudents']);

    
    Route::post('CreateAdmin',[AdminController::class,'CreateAdmin']);
    Route::post('AdminLogin',[AdminController::class,'AdminLogin']);
    Route::post('AdminLogout',[AdminController::class,'AdminLogout']);
    Route::get('GetData',[AdminController::class,'GetContactData']);
    Route::get('DeleteContact/{id}',[AdminController::class,'DeleteContact']);
    Route::post('CreateCourse',[AdminController::class,'CreateCourse']);
    Route::get('GetCourses',[AdminController::class,'GetCourses']);
    Route::get('GetCourseForFaculty',[AdminController::class,'GetCourseForFaculty']);
    Route::get('/AddFaculty',[AdminController::class,'AddFaculty']);
    Route::post('CreateFaculty',[AdminController::class,'CreateFaculty']);
    Route::get('/AllFaculties',[AdminController::class,'GetFacultiesAdmin']);
    Route::put('UpdateCourse/{id}',[AdminController::class,'UpdateCourse']);
    Route::get('DeleteCourse/{id}',[AdminController::class,'DeleteCourse']);
    Route::put('UpdateFaculties/{id}',[AdminController::class,'EditFaculties']);
    Route::get('/AddStudent',[AdminController::class,'AddStudent']);
    Route::post('CreateStudent',[AdminController::class,'CreateStudent']);
    Route::get('SearchStudent',[AdminController::class,'SearchStudent']);
    Route::get('DeleteStudent/{id}',[AdminController::class,'DeleteStudent']);
    Route::get('SelectEdit/{id}',[AdminController::class,'SelectStudent']);
    Route::put('UpdateStudent/{id}',[AdminController::class,'EditStudent']);
   
});
