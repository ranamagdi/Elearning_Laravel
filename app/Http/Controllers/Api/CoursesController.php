<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CoursesController extends Controller
{
    //
    public function index(){
        $categories=Course::all();

        $data=[
         'msg'=>'return All data from DB',
         'status'=>200,
         'data'=>$categories

        ];
        return response()->json($data);
     }
     public function show($id){
        $categories=Course::find($id);
        if($categories){
            $data=[
                'msg'=>'return one data from DB',
                'status'=>200,
                'data'=> $categories

               ];
               return response()->json($data);

        }
        else{
            $data=[
                'msg'=>'No such id',
                'status'=>202,
                'data'=>null

               ];
               return response()->json($data);

        }


    }
    public function delete($id){

        $categories=Course::find($id);
        if(File::exists(public_path('Uploads/Courses/'.$categories->img))){
            File::delete(public_path('Uploads/Courses/'.$categories->img));
            }
        $categories->delete();
        $data=[
            'msg'=>'Deleted successfllly',
            'status'=>205,
            'data'=>null
           ];
           return response()->json($data);

    }
    public function store(Request $request){
        $validateData=Validator::make($request->all(),[

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
            $image=$request->cat_img;
            $imageName=time().'_'.rand(0,1000).'_'.$image->extension();
            $image->move(public_path('Uploads/Courses'),$imageName);
        }
        if($validateData->fails()){
         $data=[
             'msg'=>'No valid data',
             'status'=>203,
             'data'=>$validateData->errors()
            ];
            return response()->json($data);

        }



        $final=Course::Create([
             'id'=>$request->id,
             'name'=>$request->name,
             'price'=>$request->price,
             'img'=>$imageName,
             'desc'=>$request->desc,
             'small_desc'=>$request->small_desc,
             'cat_id'=>$request->cat_id,
             'trainer_id'=>$request->trainer_id




         ] );
         $data=[
             'msg'=>'Create new Record success',
             'status'=>200,
             'data'=>$final
            ];
            return response()->json($data);


     }
     public function update(Request $request){
        $validateData=Validator::make($request->all(),[

            'name'=>'max:50|string',
            'price'=>'integer',
            'desc'=>'string',
            'small_desc'=>'max:50|string',
            'img'=>'image|mimes:png,jpg,jpeg',
            'cat_id'=>'exists:cats,id',
            'trainer_id'=>'exists:trainers,id'

           ]);
           $imageName="";
           if($request->hasFile('img')){
               $image=$request->cat_img;
               $imageName=time().'_'.rand(0,1000).'_'.$image->extension();
               $image->move(public_path('Uploads/Courses'),$imageName);
           }
           if($validateData->fails()){
            $data=[
                'msg'=>'No valid data',
                'status'=>203,
                'data'=>$validateData->errors()
               ];
               return response()->json($data);

           }
        $categories_id=$request->old_id;
        $update=Course::findOrFail($categories_id);

      $update->update([
             'id'=>$request->id,
             'name'=>$request->name,
             'price'=>$request->price,
             'img'=>$imageName,
             'desc'=>$request->desc,
             'small_desc'=>$request->small_desc,
             'cat_id'=>$request->cat_id,
             'trainer_id'=>$request->trainer_id


        ]

        );
        $data=[
            'msg'=>'Updated successfllly',
            'status'=>207,
            'data'=>$update
           ];
           return response()->json($data);

    }
}
