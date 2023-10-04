<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;



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
       $newName=$data['name']->hashName();
       Image::make($data['img'])->resize(50,50)->save(public_path('Uploads/Trainers'.$newName));
       $data['img']=$newName;
       Trainer::create($data);
       return redirect(route('admin.cat'));
    }
    // public function edit($id) {
    //     $allCategories=Cat::all();
    //     $categories=Cat::findOrFail($id);
    //     return view('Admin.Cat.edit',['categories'=>$categories],['allCategories'=>$allCategories]);
    // }
    // public function update(Request $request){

    //     $data=$request->validate([
    //         'name'=>'required|max:20|string'
    //      ]);
    //      Cat::findOrFail($request->old_id)->update($data);
    //      return redirect()->route('admin.cat')->with('Success','updated success');

    // }


}
