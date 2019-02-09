<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\friend;
use App\message;
use Auth;
use App\User;
use App\studentsubject;
class MessagesController extends Controller
{
   public static function getAllChatPeople()
   {
    //get student teachers 
    if(Auth::user()->position == "student" ){
      $result=studentsubject::where('student',Auth::user()->id)->crossJoin('users','users.email','=','studentsubjects.teacher')->distinct()->get();
    //  dd($result);
         $teacherNew=[];
          foreach ($result as $key => $value) {
          if(in_array($value['teacher'],$teacherNew)){
            unset($result[$key]);
          }
            else{
              $teacherNew[]=$value['teacher'];
            }
          }
     
        return($result);
    }

    if(Auth::user()->position == "teacher")
    {
       $result=studentsubject::where('teacher',Auth::user()->email)->crossJoin('users','users.id','=','studentsubjects.student')->distinct()->get();
    //  dd($result);
         $studentNew=[];
          foreach ($result as $key => $value) {
          if(in_array($value['teacher'],$studentNew)){
            unset($result[$key]);
          }
            else{
              $studentNew[]=$value['teacher'];
            }
          }
     
        return($result);
    }
        
   }

   public function sendMessages(Request $request)
   {   
    
    $data=$request->all();

    $message=new message;
    
    $message->message=$data['message'];
 
    $message->user_id=Auth::user()->id;
    $message->receiver_id=session('friend');
    $message->receiver_is_seen=false;
    //   return $message;
    $message->save();

        return json_encode(['done',$message]);
   
   }

   public  function getMessages(Request $request)
   {   
     $receiver_id=$request->all()['friend_id'];
    $get=message::where([['user_id','=',Auth::user()->id],['receiver_id','=',$receiver_id]])
        ->orWhere([['user_id','=',$receiver_id],['receiver_id','=',Auth::user()->id]])
        //->orderBy('id')
       // ->limit(5)
        ->get();
       // dd($get);
        $friend=User::where('id',$receiver_id)->first();

     session(['friend'=>$receiver_id]);

        return ((count($get)<1) ? json_encode(['nothing',null,$friend]) : json_encode(["yep",$get,$friend]));
   }


   public function showMessanger(){
    return view('chat.chat');
   }

}
?>
