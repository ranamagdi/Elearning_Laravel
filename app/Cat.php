<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    //

    protected $fillable = ['id','name'];
    public function courses(){
        return $this->hasMany('App\Course');
    }
}
