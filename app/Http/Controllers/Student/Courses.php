<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\studentsubject;
use App\subject;
use App\material;
use App\studentmaterial;
use App\Http\Controllers\Teacher\TeacherController;

class Courses extends Controller
{
  function __construct(){
    $this->middleware('auth');
  }
   public function getCourse()
   {

  


    $subject=studentsubject::where('student',Auth::user()->id)->get();



    return view ('client.viewcourses',compact('subject'));


   }

    public function details(subject $course)
    {
    //get all the free course
      $general['video']=material::where([
        ['course','=',$course->id],
        ['type','=','video']
        ])->get();
      $general['audio']=material::where([
        ['course','=',$course->id],
        ['type','=','audio']
        ])->get();
      $general['pdf']=material::where([
        ['course','=',$course->id],
        ['type','=','pdf']
        ])->get();


      //get teacher reource
      $teacherMat['video']=[];
          $teacherMat['pdf']=[];
           $teacherMat['audio']=[];
/*need to fix something here, the where clause should be where([
        ['course','=',$course->id],
        ['type','=','audio']
        ])
      */
       // dd($course->id);
      $teacher=studentmaterial::
      where([['student_id','=',Auth::user()->id],['subject_id','=',$course->id]])
      ->leftJoin('materials','studentmaterials.material_id','=','materials.id')
      ->get();
     // dd($teacher);
      foreach ($teacher as $key => $value) {
        if($value['type']== 'audio'){
           $teacherMat['audio'][]=$value;
        }
        if($value['type']=='pdf'){
          $teacherMat['pdf'][]=$value;

        }
        if($value['type']=='video'){
          $teacherMat['video'][]=$value;
          
        }
      
      }

      return view('client.coursedetails',compact('course','general','teacherMat'));
    }

    public function viewMaterialDetails($type,$course,$specific=null)
    {   if($specific==null)
      {
        $getMaterials=material::where([
          ['type','=',$type],
          ['course','=',$course],
          ['class','=',Auth::user()->class]
          ])->paginate();

      }

      else
      {
        $materials=studentmaterial::where('student_id',Auth()->user()->id)->get();
        foreach ($materials as $key => $value) {
          $material[]=$value['material_id'];
        }

        $getMaterials=material::whereIn('id',$material)->where([['type','=',$type]])->paginate();
       
      }

      return view('client.materialdetail',compact('getMaterials','type'));


    }

    public static function getCourseById($id)
    {
        return (subject::where('id',$id)->first());
    }

    public function showAllCourses(Request $request)
      { 

        if(isset($request->all()['class']))
      {
       
        $getCoursesForSpecifClass=subject::where('class',$request->all()['class'])->paginate();
      }

      $getCourseForUsersClass=subject::where('class',Auth::user()->class)->paginate();
      $courses=(isset($getCoursesForSpecifClass))?$getCoursesForSpecifClass:$getCourseForUsersClass;


      return view('client.allCourses',compact('courses'));
    }

    public static function checkUserAlreadySignedUpForCourse($course_id)
    {
      if(studentsubject::where([['subject','=',$course_id],['student','=',Auth::user()->id]])->first()==null){
        //subject has not been registered
        return false;
      }
      return true;
    }

    public function courseSetup()
    { if(session('anis_course')==null)
      {
        abort(404);
      }

      $course=$this->getCourseById(session('anis_course'));
      $teacher=$this->addToUsersCourse($course->id);

      session(['anis_course'=>null]);

      return view('client.coursesetup',compact('course','teacher'));
    }

    public function addToUsersCourse($course){
      $teacher_= new TeacherController;
     $teacher=$teacher_->pickFreeTeacher($course);
      $add=new studentsubject;
      $add->student=Auth::user()->id;
      $add->subject=$course;
      $add->teacher= $teacher;
      $add->save();
      return $teacher;
    }

}
