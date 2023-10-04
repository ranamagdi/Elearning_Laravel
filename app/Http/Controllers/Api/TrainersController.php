<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TrainersController extends Controller
{
    //
    public function index(){
        $categories=Trainer::all();

        $data=[
         'msg'=>'return All data from DB',
         'status'=>200,
         'data'=>$categories

        ];
        return response()->json($data);
     }
     public function show($id){
        $categories=Trainer::find($id);
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

        $categories=Trainer::find($id);
        if(File::exists(public_path('Uploads/Trainers/'.$categories->img))){
            File::delete(public_path('Uploads/Trainers/'.$categories->img));
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

            'name'=>'required|max:20|string',
            'phone'=>'nullable|max:20|string',
            'spec'=>'required|max:20|string',
            'img'=>'required|image|mimes:png,jpg,jpeg'

        ]);
        $imageName="";
        if($request->hasFile('img')){
            $image=$request->cat_img;
            $imageName=time().'_'.rand(0,1000).'_'.$image->extension();
            $image->move(public_path('Uploads/Trainers'),$imageName);
        }
        if($validateData->fails()){
         $data=[
             'msg'=>'No valid data',
             'status'=>203,
             'data'=>$validateData->errors()
            ];
            return response()->json($data);

        }



        $final=Trainer::Create([
             'id'=>$request->id,
             'name'=>$request->name,
             'phone'=>$request->phone,
             'img'=>$imageName,
             'spec'=>$request->spec,





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

            'name'=>'max:20|string',
            'phone'=>'nullable|max:20|string',
            'spec'=>'max:20|string',
            'img'=>'image|mimes:png,jpg,jpeg'

           ]);
           $imageName="";
           if($request->hasFile('img')){
               $image=$request->cat_img;
               $imageName=time().'_'.rand(0,1000).'_'.$image->extension();
               $image->move(public_path('Uploads/Trainers'),$imageName);
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
        $update=Trainer::findOrFail($categories_id);

      $update->update([
        'id'=>$request->id,
        'name'=>$request->name,
        'phone'=>$request->phone,
        'img'=>$imageName,
        'spec'=>$request->spec,


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
