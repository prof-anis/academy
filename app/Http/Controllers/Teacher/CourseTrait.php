<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\studentsubject;
use Auth;
use App\test;
use App\material;
use App\studentmaterial;
use App\User;
use App\questionbank;

trait CourseTrait 
{
    //get all course details

    public static function get_no_of_course_students($course)
    {
    	return  count(studentsubject::where([['subject','=',$course],['teacher','=',Auth::user()->email]])->get());
    }

    public function students($subject)
    {
    	$get=studentsubject::where([['teacher','=',Auth::user()->email],['subject','=',$subject]])
    						->leftJoin('users','users.id','=','studentsubjects.student')
    							->get(['users.id','users.email','studentsubjects.teacher','studentsubjects.subject','studentsubjects.student']);
    						return $get;
    }

    public function activeTest($subject,$limit=null){
        if($limit !== null){

    		return test::where([['teachers_id','=',Auth::user()->id],['subject','=',$subject],['status','=','sample']])
                            ->limit($limit)
    						->get();
        }
        return test::where([['status','=','sample'],['teachers_id','=',Auth::user()->id],['subject','=',$subject]])
                            ->get();
    }

    public function activeMaterials($subject)
    {
    	return material::where('course',$subject)->get();
    }

    public function studentTest($student,$subject)
    {
        return test::where([['tests.student_id','=',$student],['teachers_id','=',Auth::user()->id],['subject','=',$subject]])
        

          // ->leftJoin('exam_details','tests.id','=','exam_details.test_id')
            ->get();
            /*['tests.id','tests.teachers_id','tests.student_id','tests.status','tests.subject','tests.topic','tests.time','tests.question_no','tests.name','exam_details.score']*/
    }

    public function allTest($student,$subject)
    {   //get the topics of the tests the student have already
        //the student here is redundant
        $topics=test::where([['teachers_id','=',Auth::user()->id],['subject','=',$subject],['status','=','sample']])
             ->get();
          
            return $topics;
        
    }

    public function studentMaterials($student,$subject)
    {
       // dd($subject);
      $get=studentmaterial::where([['student_id','=',$student],['subject_id','=',$subject]])
        ->leftJoin('materials','materials.id','=','studentmaterials.material_id')
      ->get();
    //  dd($get);
        return $get;
       


    }

    public function allMaterial($subject){
        return material::where('course',$subject)->get();
    }

    public function getStudent($student)
    {
        //dd($student);
        return user::where('users.id',$student)
        ->leftJoin('studentprofiles','users.email','=','studentprofiles.email')
        ->first();
    }

    public static function countQuestionNumbers($test_id)
    {
        return count(questionbank::where('test_id',$test_id)->get());
    }


}
