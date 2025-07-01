<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;
class ContactController extends Controller
{
    function CreateContact(Request $request){
        
        $data = new ContactModel;

        $data-> name = $request->input('name');
        $data-> email = $request->input('email');
        $data-> subject = $request->input('subject');
        
        $data-> message = $request->input('message');


        $data->save();
        return redirect('/Contact');
    }
}
