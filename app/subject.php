<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    public function studentsubject(){
    	return $this->hasMany('App\studentsubject','subject','id');
    }
}
