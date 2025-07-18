<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\ContactModel;
use Illuminate\Support\Facades\Hash;
use App\Models\course;
use App\Models\faculty;
use App\Models\Students;
use App\Models\Enroll;
use App\Models\Graduates;
use App\Models\MediaVideo;
use App\Models\MediaGallery;
use App\Mail\VerificationMail;
use App\Mail\RejectionMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
class AdminController extends Controller
{
    function CreateAdmin(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'faculty' => 'required|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $profilePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePath = $request->file('profile_picture')->store('admin_profiles', 'public');
        }

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'faculty' => $request->faculty,
            'profile_picture' => $profilePath
        ]);

        session(['admin' => $admin]);

        return redirect('/')->with('success', 'Admin registered successfully!');
    
    }


    function AdminLogin(Request $RequestForAdmin){
     $validated = $RequestForAdmin->validate([
        'email'    => 'required|email',
        'password' => 'required|min:6',
    ]);

    $admin = Admin::where('email', $validated['email'])->first();

    if (!$admin || !Hash::check($validated['password'], $admin->password)) {
        return redirect('/Admin')->withErrors(['login' => 'Invalid email or password.'])->withInput();
    }

    // Store admin in session
    session(['admin' => $admin]);
    

    return redirect('/GetAllStudents');
    }


    function AdminLogout(){
        session()->forget('admin');
    return redirect('/')->with('success', 'Admin Logged out successfully');
    }


    function GetContactData(){
        $contact = ContactModel::all();

        return view('Admin.ContactData',['contacts' => $contact]);
    }



    function DeleteContact($id){
        $deleteContact = ContactModel::destroy($id);

        if($deleteContact){
            return redirect('GetData');
        }
        else{
            return redirect('GetData');
        }

    }


    function CreateCourse(Request $RequestForCourse)
{
    $response = $RequestForCourse->validate([
        "name" => "required",
        "description" => "required",
        "total_classes" => "required",
        "duration" => "required",
        "fee" => "required"
    ]);

    $IsCourseExist = Course::where('name', $response['name'])->first();

    if ($IsCourseExist) {
        return redirect('/AddCourse')->with('error', 'Course already exists');
    }

    $payload = new Course;

    $payload->name = $response['name'];
    $payload->description = $response['description'];
    $payload->total_classes = $response['total_classes'];
    $payload->duration = $response['duration'];
    $payload->fee = $response['fee'];

    $payload->save();

    return redirect('/AddCourse')->with('success', 'Course Added Successfully');
}


    function GetCourses(){


        $course = Course::paginate(8);
       return view('Admin.ShowAllCourses', ['courses' => $course]);

    }


    function AddFaculty(){
        $GetCourse = Course::all();
        return view('Admin.AddFaculty',['courses'=>$GetCourse]);
    }



    function CreateFaculty(Request $RequestForCreateFaaculty){
        $faculty = $RequestForCreateFaaculty->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required',
            'education'=> 'required',
            'age' => 'required',
            'specialty'=> 'required',
            'course_id' => 'required'
        ]);

        $profilePathagin = null;
        if ($RequestForCreateFaaculty->hasFile('profile_image')) {
            $profilePathagin = $RequestForCreateFaaculty->file('profile_image')->store('admin_profiles', 'public');
        }

        $final = faculty::create([
            'profile_picture' => $profilePathagin,
            'name' => $RequestForCreateFaaculty->name,
            'education' => $RequestForCreateFaaculty->education,
            'age' => $RequestForCreateFaaculty->age,
            'specialty' => $RequestForCreateFaaculty->specialty,
            'course_id' => $RequestForCreateFaaculty->course_id
        ]);



        return redirect('/AddFaculty');

    }

    function GetFaculties() {
    $faculties = faculty::paginate(8); // Show 6 faculty members per page
    return view('Team', ['team' => $faculties]);
}




    function GetFacultiesAdmin(){
        $AdminFaculties = faculty::paginate(8);
        return view('Admin.ShowFaculties',['faculties'=>$AdminFaculties]);
    }



    function UpdateCourse(Request $RequestForUpdateCourse, $id){

        $findCourse = Course::find($id);

    $findCourse->name = $RequestForUpdateCourse['name'];
    $findCourse->description = $RequestForUpdateCourse['description'];
    $findCourse->total_classes = $RequestForUpdateCourse['total_classes'];
    $findCourse->duration = $RequestForUpdateCourse['duration'];
    $findCourse->fee = $RequestForUpdateCourse['fee'];


        $findCourse->save();

        return redirect('/GetCourses');
        

    }


 
    public function DeleteCourse($id)
{
    $course = Course::find($id);

    if ($course) {
        $course->delete();
        return redirect('/GetCourses')->with('success', 'Course deleted successfully.');
    }

    return redirect('/GetCourses')->with('error', 'Course not found.');
}



    function EditFaculties(Request $requestforupdatefaculty , $id){
        $validated = $requestforupdatefaculty->validate([
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'name' => 'required|string|max:255',
        'education' => 'required|string|max:255',
        'age' => 'required|integer',
        'specialty' => 'required|string|max:255',
        'course_id' => 'required|integer'
    ]);

    $faculty = Faculty::findOrFail($id);

    // Only store new image if uploaded (don't delete old one)
    if ($requestforupdatefaculty->hasFile('profile_picture')) {
        $validated['profile_picture'] = $requestforupdatefaculty->file('profile_picture')->store('admin_profiles', 'public');
    }

    // Update faculty with new or existing image
    $faculty->update([
        'profile_picture' => $validated['profile_picture'] ?? $faculty->profile_picture,
        'name' => $validated['name'],
        'education' => $validated['education'],
        'age' => $validated['age'],
        'specialty' => $validated['specialty'],
        'course_id' => $validated['course_id'],
    ]);

    return redirect('/AllFaculties')->with('success', 'Faculty updated successfully.');
    }

    

    function AddStudent(){
        return view('Admin.AddStudent');
    }




   function CreateStudent(Request $request)
{
    $validated = $request->validate([
        'form_no' => 'required|string',
        'reg_no' => 'required|string',
        'date' => 'required|date',
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'guardian_name' => 'required|string',
        'dob' => 'required|date',
        'age' => 'required|integer',
        'cnic' => 'required|string',
        'gender' => 'required|string',
        'marital_status' => 'required|string',
        'mobile' => 'required|string',
        'documents' => 'required|string',
        'terms' => 'required|string',
        'signature' => 'required|accepted',
        'courses' => 'required|array',
    ]);

    $selectedCourses = $request->courses;
    $courseDetails = [];

    foreach ($selectedCourses as $course) {
        switch ($course) {
            case 'CIT':
                $timing = $request->cit_timing;
                break;
            case 'Graphic Designing':
                $timing = $request->graphic_timing;
                break;
            case '3D Animation':
                $timing = $request->animation_timing;
                break;
            case 'Digital Marketing':
                $timing = $request->dm_timing;
                break;
            case 'Web Development':
                $timing = $request->web_timing;
                break;
            case 'Mobile App Development':
                $timing = $request->mobile_timing;
                break;
            case 'AC Repairing':
                $timing = $request->ac_timing;
                break;
            default:
                $timing = null;
        }
        $courseDetails[] = [
            'course' => $course,
            'timing' => $timing,
        ];
    }

    $student = new Students;
    $student->form_no = $request->form_no;
    $student->reg_no = $request->reg_no;
    $student->date = $request->date;
    $student->first_name = $request->first_name;
    $student->last_name = $request->last_name;
    $student->guardian_name = $request->guardian_name;
    $student->dob = $request->dob;
    $student->age = $request->age;
    $student->cnic = $request->cnic;
    $student->gender = $request->gender;
    $student->marital_status = $request->marital_status;
    $student->mobile = $request->mobile;
    $student->home_contact = $request->home_contact;
    $student->email = $request->email;
    $student->address = $request->address;
    $student->courses = json_encode($courseDetails);
    $student->documents = $request->documents;
    $student->terms = $request->terms;
    $student->signature = true;

    $student->save();

    // ab slip generate karain:
    $data = [
        'student' => $student,
    ];

    $pdf = Pdf::loadView('Admin.AdmissionSlip', $data);
    return $pdf->download('admission-slip.pdf');

}

    function SearchStudent(Request $searchRequest)
{
    $searchTerm = $searchRequest->input('search', ''); // default to empty string
    $data = Students::where('first_name', 'like', "%$searchTerm%")->get();
    return view('Admin.ShowStudents',['MyStudent'=>$data]);



}



function GetStudents(){
    $data = Students::paginate(8);


    if($data){
    return view('Admin.ShowStudents',['MyStudent'=>$data]);

    }
}


    function DeleteStudent($id){
        $result = Students::destroy($id);

        if($result){
            return redirect('/GetAllStudents');
        }
    }



    function SelectStudent($id){
        $SelectStudent = Students::find($id);
        if($SelectStudent){
            return view('Admin.EditStudent',['selectStudent'=>$SelectStudent]);
        }
    }



    public function EditStudent(Request $request, $id)
{
    $validated = $request->validate([
        'form_no' => 'required|string',
        'reg_no' => 'required|string',
        'date' => 'required|date',
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'guardian_name' => 'required|string',
        'dob' => 'required|date',
        'age' => 'required|integer',
        'cnic' => 'required|string',
        'gender' => 'required|string',
        'marital_status' => 'required|string',
        'mobile' => 'required|string',
        'documents' => 'required|string',
        'terms' => 'required|string',
        'signature' => 'nullable',
        'courses' => 'required|array',
    ]);

    $selectedCourses = $request->courses;
    $courseDetails = [];

    foreach ($selectedCourses as $course) {
        switch ($course) {
            case 'CIT':
                $timing = $request->cit_timing;
                break;
            case 'Graphic Designing':
                $timing = $request->graphic_timing;
                break;
            case '3D Animation':
                $timing = $request->animation_timing;
                break;
            case 'Digital Marketing':
                $timing = $request->dm_timing;
                break;
            case 'Web Development':
                $timing = $request->web_timing;
                break;
            case 'Mobile App Development':
                $timing = $request->mobile_timing;
                break;
            case 'AC Repairing':
                $timing = $request->ac_timing;
                break;
            default:
                $timing = null;
        }
        $courseDetails[] = [
            'course' => $course,
            'timing' => $timing,
        ];
    }

    $student = Students::findOrFail($id);
    $student->form_no = $request->form_no;
    $student->reg_no = $request->reg_no;
    $student->date = $request->date;
    $student->first_name = $request->first_name;
    $student->last_name = $request->last_name;
    $student->guardian_name = $request->guardian_name;
    $student->dob = $request->dob;
    $student->age = $request->age;
    $student->cnic = $request->cnic;
    $student->gender = $request->gender;
    $student->marital_status = $request->marital_status;
    $student->mobile = $request->mobile;
    $student->home_contact = $request->home_contact;
    $student->email = $request->email;
    $student->address = $request->address;
    $student->courses = json_encode($courseDetails);
    $student->documents = $request->documents;
    $student->terms = $request->terms;
    $student->signature = $request->has('signature') ? true : false;

    $student->save();

    return redirect('/GetAllStudents')->with('success', 'Student updated successfully');
}


    function EnrollRequestofStudents(){

        $final = Enroll::all();

        if($final){

            return view('Admin.EnrollRequest',['Enrolls' => $final]);
        }

    }


    public function approve($id)
{
    $enroll = Enroll::findOrFail($id);
    // $enroll->status = 'approved';
    $enroll->save();

    Mail::to($enroll->email)->send(new VerificationMail($enroll));

    return redirect('/EnrollRequests')->with('success', 'Enrollment approved and verification email sent.');
}

public function reject($id)
{
    $enroll = Enroll::findOrFail($id);
    // $enroll->status = 'rejected';
    $enroll->save();

    Mail::to($enroll->email)->send(new RejectionMail($enroll));

    return redirect('/EnrollRequests')->with('error', 'Enrollment rejected and rejection email sent.');
}



    function UploadIamge(){
        return view('Admin.UploadMediaImgae');
    }
    function UploadVideo(){
        return view('Admin.UploadMediaVideo');
    }


    function UploadVideoNow(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video' => 'required|mimes:mp4,avi,mov|max:204800' // max 200MB
        ]);

        $path = $request->file('video')->store('videos', 'public');

        MediaVideo::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'path' => $path
        ]);

        return back()->with('success', 'Video uploaded successfully!');
    }



    function UploadImageNow(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        $path = $request->file("image")->store('Media','public');

        MediaGallery::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'path' => $path
        ]);

        return back()->with('success', 'Media uploaded successfully!');
    }


    function ShowImageContent(){
        $Images = MediaGallery::all();


        if($Images){
            return view('Admin.ShowImages',['MyImages' => $Images]);
        }
    }


    function DeleteContent($id) {
    $DeleteImage = MediaGallery::destroy($id);

    return redirect('/DisplayImagesAdmin')->with('success', 'Media deleted successfully.');
    }



    function AddGardutes(){
        return view('Admin.Graduates');
    }


    public function CreateGraduates(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'father_name' => 'required|string',
        'course' => 'required|string',
        'graduation_date' => 'required|date',
        'grade' => 'required|string',
    ]);

    $graduate = new Graduates;

    $graduate->name = $validated['name'];
    $graduate->father_name = $validated['father_name'];
    $graduate->course = $validated['course'];
    $graduate->graduation_date = $validated['graduation_date'];
    $graduate->grade = $validated['grade'];

    $graduate->save();

    return redirect('/AddGardutes')->with('success', 'Graduate added successfully!');
}



    function DisplayGraduates(){
        $graduates = Graduates::all();

        if($graduates){
            return view('Admin.ShowGraduates',['graduates' => $graduates]);
        }
    }



    function DeleteGraduates($id){
        $GraduatesDelete = Graduates::destroy($id);

        if($GraduatesDelete){
            return redirect('/ShowGraduates');
        }
    }


    

}