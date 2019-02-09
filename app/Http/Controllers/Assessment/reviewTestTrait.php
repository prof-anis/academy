<?php

namespace App\Http\Controllers\Assessment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\test;
use App\Exam_detail;
use Auth;
use App\questionbank;

trait reviewTestTrait 
{
    public function getExamDetails(Test $test_id)
    {
    	return Exam_detail::where([['Exam_details.test_id','=',$test_id->id],['Exam_details.student_id','=',Auth::user()->id]])->leftJoin('tests','tests.id','=','Exam_details.test_id')->first();
    	//$questions_ans_id=json_decode($test_details->ans_provided);
    }

    public function getActualQuestion(Test $test_id)
    {
    	$questions_id=array_keys(json_decode($this->getExamDetails($test_id)->ans_provided,1));
    	$questions=questionbank::whereIn('id',$questions_id)->get();
    	return $questions;
    }

    public function getUserAns($test_id)
    {
    	$ans=json_decode($this->getExamDetails($test_id)->ans_provided,1);
    	return $ans;
    }

    public function getDbAns()
    {
    	
    }
}
