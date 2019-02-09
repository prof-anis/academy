<?php

namespace App\Http\Controllers\Assessment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\questionbank;
use App\test;

class TestPreview extends Controller
{
    //

    public function preview($test_id)
    {
    	$questions=questionbank::where('test_id',$test_id)->get();
    	$time=test::find($test_id)->time;
    	$test_id=test::find($test_id);
    	return view('teacher.previewTest',compact('questions','time','test_id'));
    }
}
