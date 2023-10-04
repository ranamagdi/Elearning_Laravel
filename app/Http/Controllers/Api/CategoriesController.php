<?php

namespace App\Http\Controllers\Api;

use App\Cat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    //
    public function index(){
        $categories=Cat::all();

        $data=[
         'msg'=>'return All data from DB',
         'status'=>200,
         'data'=>$categories

        ];
        return response()->json($data);
     }
     public function show($id){
        $categories=Cat::find($id);
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

        $categories=Cat::find($id);

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


         'name'=>'required|max:20|string'

        ]);
        if($validateData->fails()){
         $data=[
             'msg'=>'No valid data',
             'status'=>203,
             'data'=>$validateData->errors()
            ];
            return response()->json($data);

        }



        $final=Cat::Create([
             'id'=>$request->id,
             'name'=>$request->name




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
         'name'=>'required|max:20|string'

           ]);
           if($validateData->fails()){
            $data=[
                'msg'=>'No valid data',
                'status'=>203,
                'data'=>$validateData->errors()
               ];
               return response()->json($data);

           }
        $categories_id=$request->old_id;
        $update=Cat::findOrFail($categories_id);

      $update->update([
        'id'=>$request->id,
        'name'=>$request->name



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
