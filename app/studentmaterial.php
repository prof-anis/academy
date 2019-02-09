<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentmaterial extends Model
{
    public function material()
    {
    	return $this->belongsTo('App\material','id','material_id');
    }
}
