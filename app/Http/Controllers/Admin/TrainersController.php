<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Trainer;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;





class TrainersController extends Controller
{
    //
    public function index(){

        $trainer=DB::table('trainers')->select('id','name','phone','spec','img')->get();
        return view('Admin.Trainer.trainer',['trainers'=>$trainer]);
    }
    public function single($category_id) {
        $trainer=Trainer::findOrFail($category_id);
        return view('Admin.Trainer.single',['trainers'=> $trainer]);

    }
    public function delete($trainer_id) {
        $trainer=Trainer::findOrFail($trainer_id);
        if(File::exists(public_path('Uploads/Trainers/'.$trainer->img))){
            File::delete(public_path('Uploads/Trainers/'.$trainer->img));
            }else{
            dd('File does not exists.');
            }

        $trainer->delete();
        return back();

    }
    public function create() {
         $trainer=Trainer::all();
        return view('Admin.Trainer.create',['trainers'=> $trainer]);
    }
    public function store(Request $request) {
        $data=$request->validate([
            'name'=>'required|max:20|string',
            'phone'=>'nullable|max:20|string',
            'spec'=>'required|max:20|string',
            'img'=>'required|image|mimes:png,jpg,jpeg'
         ]);
        $imageName="";
        if($request->hasFile('img')){
            $image=$request->img;
            $imageName=time().'_'.rand(0,1000).'_'.$image->extension();
            $image->move(public_path('Uploads/Trainers'),$imageName);
        }


       $data['img']=$imageName;

       Trainer::create($data);
       return redirect(route('admin.trainer'));
    }
    public function edit($id) {
        $allTrainers=Trainer::all();
        $trainer=Trainer::findOrFail($id);
        return view('Admin.Trainer.edit',['trainer'=>$trainer],['allTrainers'=>$allTrainers]);
    }
    public function update(Request $request){

        $data=$request->validate([
            'name'=>'required|max:20|string',
            'phone'=>'nullable|max:20|string',
            'spec'=>'required|max:20|string',
            'img'=>'nullable|image|mimes:png,jpg,jpeg'
         ]);
         $imageName="";

        if($request->hasFile('img')){
            $image=$request->img;
            $imageName=time().'_'.rand(0,1000).'_'.$image->extension();
            $image->move(public_path('Uploads/Trainers'),$imageName);
        }


       $data['img']=$imageName;


         Trainer::findOrFail($request->old_id)->update($data);
         return redirect()->route('admin.trainer')->with('Success','updated success');

    }


}
