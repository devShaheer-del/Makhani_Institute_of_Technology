<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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


Route::get('/',[HomeController::class,'Home']);

Route::get('/About',function(){
    return view('About');
});

Route::get('/Offer',[HomeController::class,'CourseOffer']);

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


// find student graduates



Route::get('/GraduatesDetails',[UsersController::class,'findGraduates'])->name('GraduatesDetails');

Route::get('/graduates/{course}', [UsersController::class, 'showCourseGraduates'])
    ->name('graduates.byCourse');


Route::get('/StudentProfile',[UsersController::class,'fetchStudentprofile']);

Route::put('/StudentProfile/Update',[UsersController::class,'StudentUpdateProfile'])->name('student.update');

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
    Route::get('/EnrollRequests',[AdminController::class,'EnrollRequestofStudents']);
    Route::post('ApproveEmail/{id}',[AdminController::class,'approve']);
    Route::post('RejectEmail/{id}',[AdminController::class,'reject']);
    Route::get('/UploadImage',[AdminController::class,'UploadIamge']);
    Route::get('/UploadVideo',[AdminController::class,'UploadVideo']);
    Route::post('UploadVideoNow',[AdminController::class,'UploadVideoNow']);
    Route::post('UploadImageNow',[AdminController::class,'UploadImageNow']);
    Route::get('/DisplayImagesAdmin',[AdminController::class,'ShowImageContent']);
    Route::get('DeleteMedia/{id}',[AdminController::class,'DeleteContent']);
    Route::get('/AddGardutes',[AdminController::class,'AddGardutes']);
    Route::post('CreateGraduate',[AdminController::class,'CreateGraduates']);
    Route::get('/ShowGraduates',[AdminController::class,'DisplayGraduates']);
    Route::get('DeleteGraduates/{id}',[AdminController::class,'DeleteGraduates']);
    Route::delete('/delete-faculty/{id}', [AdminController::class, 'destroy'])->name('faculty.destroy');

});




Route::get('/Content',[HomeController::class,'ShowContent']);