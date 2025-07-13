<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaGallery;

class HomeController extends Controller
{
    function ShowContent(){

        $data = MediaGallery::paginate(6);

        if($data){
             return view('MediaContent',['MyContent'=> $data]);
        }
       
    }
}
