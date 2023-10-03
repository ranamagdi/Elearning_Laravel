<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Messages;
use App\NewsLetter;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessegesController extends Controller
{
    //

    public function index(Request $request){
         $data=$request->validate([
            "email"=>['required','email']
         ]);
         NewsLetter::create($data);
         return back();
    }
    public function contact(Request $request){
        $data=$request->validate([
            "name"=>['required' ,'string','max:255'],
            'email'=>['required','email'],
            'subject'=>['nullable','string'],
            'message'=>['required','string','max:1000']
         ]);
        Messages:: create($data);
         return back();
    }
    public function enroll(Request $request){
        $data=$request->validate([
            "name"=>['nullable' ,'string','max:255'],
            'email'=>['required','email'],
            'spec'=>['nullable','string'],
            'course_id'=>['required','exists:courses,id']
         ]);
         $student =Student:: create([
          'name'=> $data['name'],
          'email'=>$data['email'],
          'spec'=>$data['spec']
        ]);
        $student_id=$student->id;

        DB::table('course_student')->insert([
            'course_id'=>$data['course_id'],
            'student_id'=>$student_id,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
         return back();
    }

}
