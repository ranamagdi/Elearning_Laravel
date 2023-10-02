<?php

namespace App\Http\Controllers\Front;

use App\Cat;
use App\Course;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function showAll($id){
        $data['cat']=Cat::findOrFail($id);
        $data['courses']=Course::select('id','name','small_desc','cat_id','trainer_id','img','price')->where('cat_id',$id)->paginate(3);
        return view('front.courses.cat')->with($data);

    }
    public function show($id,$cid) {
        $data['course']=Course::select('id','name','small_desc','desc','cat_id','trainer_id','img','price')->findOrFail($cid);
        return view('front.courses.show')->with($data);
    }
}
