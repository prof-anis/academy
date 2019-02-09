<?php

namespace App\Http\Controllers\Assessment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\questionbank;
use App\test;
use App\Exam_detail;

trait testTrait
{
    public function getTestTime($test_id)
    {
      return test::where('id',$test_id)->first()->time;
    }

    public function getTestQuestions($test_id,$limit=null)
    {  if($limit!==null){
        return questionbank::where('test_id',$test_id)->limit($limit)->get();
    	}

        return questionbank::where('test_id',$test_id)->get();
    
    }

    public function getNoOfQuestion($test_id)
    {
    	return questionbank::where('test_id',$test_id)->count();
    }

    public function retrieveUserAnswers(Request $request)
    {
    
    }

    public function getDatabaseAnswers(){
       $ans=[];
        foreach (session('id') as $key => $value) {
            $ans[$value]=questionbank::where('id',$value)->first()->ans;
        }
        return $ans;
    }

    public function setIdOfQuestionsAnswered($questions)
    {
        $id=[];
       foreach ($questions as $key => $value) {
           $id[]=$value['id'];
       }

       session(['id'=>$id]);
    }


    public function getIdOfQuestionsAnswered()
    {
        return session('id');
    }
//also returns the user ans and id of questions answered
    public function compileUserAns(Request $request)

    {       $compile=[];
        //remove the token

        foreach (session('id') as $key => $value) 
        {
            if(array_key_exists("option_".$value, $request->all())){
              $compile[$value]=$request->all()["option_".$value];
            }
            else{
                $compile[$value]=null;
            }
        }
        return ($compile);
    }


    public function doMark(Request $request)
    {  
        $dbans=$this->getDatabaseAnswers();
        $score=0;
        foreach ($this->compileUserAns($request) as $key => $value) {
            if(strtolower($value)==strtolower($dbans[$key])){
                $score++;
            }
        }
        return $score;
    }


    public function getPercentageScore($request)
    {       if(count(session('id')) <1 )
    {
        return 0;
        return round((($this->doMark($request)/count(session('id')))*100)) ;
    }
    }

    public function saveUserExamDetails($score,$test_id,$ans)
    {
        $details=new Exam_detail;
        $details->student_id=Auth::user()->id;
        $details->score=$score;
        if(session('is_retake_id')!==null){
            $details->test_id=session('is_retake_id');
            session(['is_retake_id'=>null]);
        }
        else{
            $details->test_id=$test_id;   
        }
        
        $details->ans_provided=json_encode($ans);
        $details->save();
    }

    public function clearAll()
    {
        session(['id'=>null]);

    }

    public function updateTestTable($id)
    {
        $fix=test::find($id);
        $fix->status=1;
        $fix->update();
    }

    public function checkIfTestIsDoneBefore()
    {
        
    }






}
