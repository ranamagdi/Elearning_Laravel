<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable=['id','cat_id','trainer_id','name','price','desc','small_desc','img'];
    public function cat(){
        return $this->belongsTo('App\Cat');
    }

    public function trainer(){
        return $this->belongsTo('App\Trainer');
    }
    public function students(){
        return $this->belongsToMany('app\Student');
     }
}
