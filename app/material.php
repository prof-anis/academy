<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    public function studentmaterial()
    {
    	return $this->hasMany('App\studentmaterial','material_id','id');
    }
}
