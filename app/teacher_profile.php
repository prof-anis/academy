<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher_profile extends Model
{  protected $table="teacherprofiles";
    //


	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
