<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaGallery;
use App\Models\course;
use App\Models\Graduates;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function ShowContent(){

        $data = MediaGallery::paginate(6);

        if($data){
             return view('MediaContent',['MyContent'=> $data]);
        }
       
    }




    function CourseOffer(){
        $course = course::all();


        if($course){
            return view('Offer',['course' => $course]);
        }
    }



    function Home() {
    $graduates = Graduates::all();

    // Count how many students per course
    $courseCounts = Graduates::select('course', DB::raw('count(*) as total'))
                        ->groupBy('course')
                        ->pluck('total', 'course')
                        ->toArray();

    return view('Home', [
        'graduates' => $graduates,
        'courseCounts' => $courseCounts,
    ]);
}
}
