<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    //
    protected $fillable=['id','img','name'];
    public function courses(){
        return $this->hasMany('App\Course');
    }

    public function trainers(){
        return $this->hasMany('app\Trainer');
     }
}
