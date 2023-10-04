<?php


namespace App\Http\Controllers\Admin;

use App\Cat;
use App\Http\Controllers\Controller;
use App\Course;
use App\Trainer;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    //
    public function index(){

        $course=DB::table('courses')->select('id','name','price','img')->paginate(5);
        return view('Admin.Course.course',['courses'=>$course]);
    }
    public function single($category_id) {
        $course=Course::findOrFail($category_id);
        return view('Admin.Course.single',['courses'=> $course]);

    }
    public function delete($course_id) {
        $course=Course::findOrFail($course_id);
        if(File::exists(public_path('Uploads/Courses/'.$course->img))){
            File::delete(public_path('Uploads/Courses/'.$course->img));
            }else{
            dd('File does not exists.');
            }

        $course->delete();
        return back();

    }
    public function create() {
        $cats=Cat::select('id','name')->get();
        $trainer=Trainer::select('id','name')->get();
         $course=Course::all();
        return view('Admin.Course.create',['trainers'=> $trainer,'cats'=>$cats,'courses'=>$course]);
    }
    public function store(Request $request) {
        $data=$request->validate([
            'name'=>'required|max:50|string',
            'price'=>'required|integer',
            'desc'=>'required|string',
            'small_desc'=>'required|max:50|string',
            'img'=>'required|image|mimes:png,jpg,jpeg',
            'cat_id'=>'required|exists:cats,id',
            'trainer_id'=>'required|exists:trainers,id'
         ]);
        $imageName="";
        if($request->hasFile('img')){
            $image=$request->img;
            $imageName=time().'_'.rand(0,1000).'_'.$image->extension();
            $image->move(public_path('Uploads/Courses'),$imageName);
        }


       $data['img']=$imageName;

       Course::create($data);
       return redirect(route('admin.course'));
    }
    public function edit($id) {
        $cats=Cat::select('id','name')->get();
        $trainer=Trainer::select('id','name')->get();
        $allCourses=Course::all();
        $course=Course::findOrFail($id);
        return view('Admin.Course.edit',['courses'=>$course,'allCourses'=>$allCourses,'trainers'=> $trainer,'cats'=>$cats]);
    }
    public function update(Request $request){

        $data=$request->validate([
            'name'=>'required|max:50|string',
            'price'=>'required|integer',
            'desc'=>'required|string',
            'small_desc'=>'required|max:50|string',
            'img'=>'required|image|mimes:png,jpg,jpeg',
            'cat_id'=>'required|exists:cats,id',
            'trainer_id'=>'required|exists:trainers,id'
         ]);
         $imageName="";

        if($request->hasFile('img')){
            $image=$request->img;
            $imageName=time().'_'.rand(0,1000).'_'.$image->extension();
            $image->move(public_path('Uploads/Courses'),$imageName);
        }


       $data['img']=$imageName;


         Trainer::findOrFail($request->old_id)->update($data);
         return redirect()->route('admin.course')->with('Success','updated success');

    }

}
