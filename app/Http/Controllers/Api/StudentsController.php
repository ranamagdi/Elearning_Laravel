<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    //

    public function index(){
        $categories=Student::all();

        $data=[
         'msg'=>'return All data from DB',
         'status'=>200,
         'data'=>$categories

        ];
        return response()->json($data);
     }
     public function show($id){
        $categories=Student::find($id);
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

        $categories=Student::find($id);

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
            'email'=>'required|email'

        ]);
        if($validateData->fails()){
         $data=[
             'msg'=>'No valid data',
             'status'=>203,
             'data'=>$validateData->errors()
            ];
            return response()->json($data);

        }



        $final=student::Create([
             'id'=>$request->id,
             'name'=>$request->name,
             'email'=>$request->email




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

         'name'=>'required|max:50|string',
         'email'=>'required|email'

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
        $update=student::findOrFail($categories_id);

      $update->update([
        'id'=>$request->id,
        'name'=>$request->name,
        'email'=>$request->email



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
