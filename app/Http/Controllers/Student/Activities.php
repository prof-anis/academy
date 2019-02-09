<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\studentsubject;
use Auth;
use App\studentprofile;
use App\test;
use App\studentmaterial;

class Activities extends Controller
{
    public function home(){
    	//dd(studentsubject::where('student',Auth::user()->id)->first()->subject->subject);
    	$activeTest=$this->getActiveTest();
    	$material=$this->getActiveMaterials();
    	$courses=$this->getStudentCourses();
    	return view('client.index',compact('activeTest','material','courses'));
    }

    public static function getStudent()
    {
    	return studentprofile::where('email',Auth::user()->email)->first();
    }

    public function getActiveTest()
    {
    	return test::where('student_id',Auth::user()->id)->get();
    }

    public function getActiveMaterials()
    {
    	return studentmaterial::where('student_id',Auth::user()->id)->leftJoin('materials','materials.id','=','studentmaterials.material_id')->get();
    }

    public function getStudentCourses()
    {
    	return studentsubject::where('student',Auth::user()->id)->get();
    }
}
