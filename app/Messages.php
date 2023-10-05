<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    //
    protected $fillable = ['id','name','email','subject','message','spec'];

}
