<?php

namespace App\Http\Controllers\Admin;

use App\Cat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatController extends Controller
{
    //

    public function index(){
        // $data['cats']=Cat::select('id','name');
        $category=DB::table('cats')->select('id','name')->get();
        return view('Admin.Cat.cat',['category'=>$category]);
    }
    public function single($category_id) {
        $categories=Cat::findOrFail($category_id);
        return view('Admin.Cat.single',['categories'=>$categories]);

    }
    public function delete($category_id) {
        $categories=Cat::findOrFail($category_id);

        $categories->delete();
        return back();

    }
    public function create() {
        $categories=Cat::all();
        return view('Admin.Cat.create',['categories'=>$categories]);
    }
    public function store(Request $request) {
       $data=$request->validate([
          'name'=>'required|max:20|string'
       ]);
       Cat::create($data);
       return redirect(route('admin.cat'));
    }
    public function edit($id) {
        $allCategories=Cat::all();
        $categories=Cat::findOrFail($id);
        return view('Admin.Cat.edit',['categories'=>$categories],['allCategories'=>$allCategories]);
    }
    public function update(Request $request){

        $data=$request->validate([
            'name'=>'required|max:20|string'
         ]);
         Cat::findOrFail($request->old_id)->update($data);
         return redirect()->route('admin.cat')->with('Success','updated success');

    }


}
