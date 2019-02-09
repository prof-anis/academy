<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentsubject extends Model
{
    public function subject(){
    	return $this->belongsTo('App\subject','subject','id');
    }
}
