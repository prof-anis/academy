<?php

namespace App\Http\Controllers\Normal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pendingteacher;
use App\User;
use App\subject;

class DefaultController extends Controller
{
    public function index(){
   return view('default.index');
    }

  
    public function register(){
      return view('default.register');
    }
    public function events()
    {
    	return view('default.events');
    }
     public function staffs()
    {   
        $staffs=User::where('position','teacher')->leftJoin('teacherprofiles','teacherprofiles.email','=','users.email')->paginate(6);
    	return view('default.staffs',compact('staffs'));
    }
     public function about()
    {
    	return view('default.about');
    }

    public function profiles($id)

    {
        $staff=User::find($id)->leftJoin('teacherprofiles','teacherprofiles.email','=','users.email')->first();
    	return view('default.profiles',compact('staff'));

    }

    public function courses($cat)
    {   

        $courses=subject::where('classification',$cat)->paginate();

        return view('default.courses',compact('courses'));

    }

    public function blog(){
    	return view('default.blog');
    }


    public function tour(){
    	return view('default.tour');
    }

    public function registerTeacher(Request $request)
    {
       // return $request->all();
        $fix=new pendingteacher;
        $fix->email=$request->email;
        $fix->subject=$request->subject;

        $fix->cv=$request->cv;

        $fix->about=$request->about;
        $fix->name=$request->name;
        $fix->status="pending";

        $fix->save();
        //add a mail class here to notify that we have seen the request and give rules and all that

//         Mail::to($fix->email)->send(new SendTeacherContract());


        return back()->with(['success'=>'your request has been successfully sent. Check your mail for an inbox. You can check your spam too']);
    }


}
