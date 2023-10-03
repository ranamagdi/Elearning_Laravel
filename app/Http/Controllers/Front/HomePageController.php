<?php

namespace App\Http\Controllers\Front;

use App\Course;
use App\Http\Controllers\Controller;
use App\SiteContent;
use App\Student;
use App\Test;
use App\Trainer;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Tests;

class HomePageController extends Controller
{
    //
    public function index() {
        $data['banner']=SiteContent::select('content')->where ('name','banner')->first();
        $data['courses_content']=SiteContent::select('content')->where ('name','courses')->first();
        $data['courses']=Course::select('id','name','small_desc','cat_id','trainer_id','img','price')
        ->orderBy('id','desc')
        ->take(3)
        ->get();
        $data['Courses_count']=Course::count();
        $data['Trainers_count']=Trainer::count();
        $data['Students_count']=Student::count();
        $data['Tests']=Test::select('name','spec','desc','img')->get();
        // dd($data['courses']);
        return view('Front.index')->with($data);

    }
}

