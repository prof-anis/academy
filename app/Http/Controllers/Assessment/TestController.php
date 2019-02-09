<?php

namespace App\Http\Controllers\Assessment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\test;
use Auth;
use App\Http\Controllers\Assessment\testTrait;
use App\Http\Controllers\Student\Courses;

class  TestController extends Controller

{
   use testTrait ;

      function __construct(){
         $this->middleware('auth');
      }
  
   public function availableTest()
   {
      $tests=test::where('student_id',Auth::user()->id)->paginate();
      return view('client.availableTest',compact('tests'));
   }
  


   public function testPage(test $test_id)
   {    
       $no_of_questions=$this->getNoOfQuestion($test_id->id);
      $questions=$this->getTestQuestions($test_id->id,$test_id->question_no);
     // dd($questions);
        $time=$this->getTestTime($test_id->id);
      $this->setIdOfQuestionsAnswered($questions);
     
   		return view ('client.testpage',compact('no_of_questions','questions','test_id','time'));
   }
   


   public function showStartTest(test $test_id)
   {
     $course_details=Courses::getCourseById($test_id->subject);
  
   	return view('client.showStartTest',compact('test_id','course_details'));
   }

   public function markTest(Request $request,$test_id)
   { 
  
    // dd($this->getPercentageScore($request));
     // dump($this->getPercentageScore($request));
      $score=$this->getPercentageScore($request);
      $this->saveUserExamDetails($score,$test_id,$this->compileUserAns($request));
      $this->clearAll();
      $this->updateTestTable($test_id);
    
     return view('client.test.resultPage',compact('score'));
   }

   public function retakeTest(test $test_id){
      $fix=new test;
      $fix->status=1;
      $fix->subject=$test_id->subject;
      $fix->topic=$test_id->topic;
      $fix->time=$test_id->time;
      $fix->question_no=$test_id->question_no;
      $fix->is_retake=true;
      $fix->prevId=$test_id->id;
      $fix->expire=null;
      $fix->teachers_id=$test_id->teachers_id;
      $fix->student_id=$test_id->student_id;
      if($fix->save()){
        session(['is_retake_id'=>$fix->id]);
        return redirect()->route('showstart@test',['id'=>$test_id]);
      }

   }




}
