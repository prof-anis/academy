<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Requests\registerstudent;
use App\Http\Controllers\Controller;
Use App\User;
use App\studentprofile;
use App\accountdetail;
use Auth;

class StudentController extends Controller
{
    public function registerUser(Request $request){

      $data=$request->all();
      //
      //create student data
//return $data;
     $user=new User;

     $user->email=$data['email']; 
      $user->status=0;
       $user->code=rand(999,9999).sha1($data['email']);
     $user->position='student';
// return json_encode($user);
     $user->password=bcrypt($data['pass']);
     $user->class=$data['user_class'];
    

    
   
     if($user->save()){
      return 'done';
     }
     else{
      return 'not done';
     }
   
    }

    public function CompareCode($code){

    if(User::where('code',$code)->first() == null){
      abort(404);
    }
    else{
      User::where('code',$code)->update(['status'=>1]);
      return redirect()->route('login');
    }

    }

    public function showsetupForm(){
     $status= User::where('email',Auth::user()->email)->first()->status;
      if($status==1){
      return view('client.setup');
    }
    return redirect()->route('student@home');
    }

    public function process(Request $request){
    $data=$request->all();
   //return json_encode($data);
    $profile=new studentprofile;
     
    $profile->name=$data['name'];
    $profile->gender=$data['gender'];
    $profile->email=Auth::user()->email;//$data['email'];
    $profile->phone=$data['phone'];

    $profile->dept=$data['dept'];
    $profile->class=$data['grade'];
    $profile->address=$data['address'];
    $profile->country=$data['country'];
    $profile->state=$data['state'];
    $profile->zip=$data['zip'];
    $profile->city=$data['city'];


 
    
   
// return json_encode($account);
    if($profile->save()){
      User::where('email',Auth::user()->email)->update(['status'=>2]);
      return 'done';
    }
    else{
      return 'not done';
    }

    }

   
}
