<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\subject;
use App\teacher;
use App\pendingteacher;
use App\Mail\SendTeacherContract;
use Mail;
use App\User;
use App\teachers_subject;

class AdminTeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //view all teachers and pending teachers
        $allTeachers=teacher::all();
        return view('superadmin.all-teachers');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($teacher=null)
    {
        //
        $teacher=pendingteacher::find($teacher);

        $allCourse=subject::all();
        return view('superadmin.create-teacher',compact('allCourse','teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //
       // if(!$this->ensureTeacherDoesNotExistBefore($request->email))
        //{
          //  return back()->with(['create_error'=>"teacher already exists!"]);
        //}
      // return $request->all();
        $fix=pendingteacher::findOrFail($id);
        $fix->email=$request->all()['email'];
        $fix->subject_attached=json_encode($request->all()['subject']);
        $fix->status="awaiting client approval";
        $fix->code=rand(999,9999);
        $fix->update();

     //  Mail::to($fix->email)->send(new SendTeacherContract());

        return back()->with(['create_success'=>'you have successfully sent a proposal to the teacher. You would be notified if he/she has accepted it']);


    }

    public function requestProcessedBefore()
    {

    }

    public function viewRequests()
    {   $requests=pendingteacher::where('status','pending')->get();
        return view('superadmin.requests',compact('requests'));
    }

    public function deleteRequest($id)
    {
        $get=pendingteacher::findOrFail($id)->delete();
        return back()->with(['success'=>'you have deleted a request']);
    }

    public function confirmCode($email,$code)
    {
        $get=pendingteacher::where([['code','=',$code],['email','=',$email]])->first();

        if($get == null)
        {
            abort(404);
        }
//fixing registration in user
        $fix=new User;
        $fix->email=$get->email;
        $fix->password=bcrypt('secret');
        $fix->position='teacher';
        $fix->status=1;
        $fix->code=$get->code;
        $fix->save();


//fixing adding to teachers subject
        $fix=new teachers_subject;
        $fix->teachers_id=$fix->id;
        $fix->subject_id=$get->subject_attached;
        $fix->save();

//fixing removal from pendling list
         $get->delete();


        return redirect()->route('login');

    }

    public function viewAllTeachers()
    {
        $teachers=User::where('users.position','teacher')
        ->leftJoin('teacherprofiles','teacherprofiles.email','=','users.email')
        ->get(['users.email','users.id','teacherprofiles.name']);

       // dd($teachers);
        return view("superadmin.all-teachers",compact('teachers'));
    }
 
}
