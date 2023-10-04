<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    //
    public function index(){
        // $data['cats']=Cat::select('id','name');
        $student=DB::table('students')->select('id','name','email')->get();
        return view('Admin.Student.student',['student'=>$student]);
    }
    public function single($student_id) {
        $students=Student::findOrFail($student_id);
        return view('Admin.Student.single',['student'=>$students]);

    }
    public function delete($student_id) {
        $student=Student::findOrFail($student_id);

        $student->delete();
        return back();

    }
    public function create() {
        $student=Student::all();
        return view('Admin.Student.create',['student'=>$student]);
    }
    public function store(Request $request) {
       $data=$request->validate([
          'name'=>'required|max:50|string',
          'email'=>'required|email'
       ]);
       Student::create($data);
       return redirect(route('admin.student'));
    }
    public function edit($id) {
        $allstudent=Student::all();
        $student=Student::findOrFail($id);
        return view('Admin.Student.edit',['student'=>$student],['allstudent'=>$allstudent]);
    }
    public function update(Request $request){

        $data=$request->validate([
            'name'=>'required|max:50|string',
            'email'=>'required|email'
         ]);
         Student::findOrFail($request->old_id)->update($data);
         return redirect()->route('admin.student')->with('Success','updated success');

    }

}
