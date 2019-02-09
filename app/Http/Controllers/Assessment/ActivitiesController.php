<?php

namespace App\Http\Controllers\Assessment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\test; 
use Auth;
use App\subject;
use App\Exam_detail;
use App\Http\Controllers\Assessment\reviewTestTrait;

class ActivitiesController extends Controller
{
    //
    use reviewTestTrait;

    public function checkUpdates()
    {
    	$currActiveTest=test::where([['status','=',0],['student_id','=',Auth::user()->id]])->get();
    	return view('client.test.update',compact('currActiveTest'));
    }

    public function pastTest()
    {
    	$pastTest=test::where([['status','=',1],['student_id','=',Auth::user()->id]])->get();
    	return view('client.test.pasttest',compact('pastTest'));
    }

    public function reviewTest(Test $test_id)
    {   
    	$questions=$this->getActualQuestion($test_id);
    	$ans=$this->getUserAns($test_id);
  
    	
    	return view('client.test.reviewtest',compact('questions','ans'));

    }


}
