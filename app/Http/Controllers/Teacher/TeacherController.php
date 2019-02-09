<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\teachers_subject;
use App\studentsubject;
use Auth;
use App\Http\Controllers\Teacher\CourseTrait;
use App\test;
use App\studentmaterial;
use App\material;
use Storage;
use App\subject;
use App\questionbank;

class TeacherController extends Controller
{   use CourseTrait;

    function __construct(){
         $this->middleware('auth');
    }
    public static function getTeacher($id)
    {
    	return User::where('users.id',$id)->leftJoin('teacherprofiles','users.email','=','teacherprofiles.email')->first();
    }
    public static function getTeacherByEmail($email)
    {
    	return User::where('users.email',$email)->leftJoin('teacherprofiles','users.email','=','teacherprofiles.email')->first(['users.email']);
    }

    public function pickFreeTeacher($course)
    {
    	//condition
    	//1. must not have more than 20 students
    	//2. must be taking that course
    	//$check=User::where('position','teacher')->

    	$getCourseTeachers=teachers_subject::where('subject_id',$course)->get(); 
    	foreach ($getCourseTeachers as $key => $value) {
    		$getStudentAttached=studentsubject::where('teacher',$value['email'])->get();
    		if(count($getStudentAttached)<20){
    			$teacher=$getCourseTeachers[$key];
    		}
    	}
    	if(!isset($teacher)){
    		$teacher="none";
        $teacher=$getCourseTeachers[0];
    	}


    	return ($teacher);
    }

    public function home()
    {

        $allStudent=studentsubject::where('teacher')
        return view('teacher.index');
    }

    public static function getTeacherCourses()
    {
        return teachers_subject::where('teachers_id',Auth::user()->email)->leftJoin('subjects','subjects.id','=','teachersubjects.subject_id')->limit(6)->get();
    }

    public function courseDetails($subject)

    {    // dd($subject);
        $student=$this->students($subject);
        //dd($student);
       // dd($student);
        $test=$this->activeTest($subject);
        //dd($test);
        $materials__=$this->activeMaterials($subject);
        $materials['pdf']=0;
         $materials['audio']=0;
          $materials['video']=0;
        foreach ($materials__ as $key => $value) {
           if($value['type']=='pdf'){
            $materials['pdf']++;
           }
            if($value['type']=='video'){
            $materials['video']++;
           }
            if($value['type']=='audio'){
            $materials['audio']++;
           }
        }
        $course_students;
        return view('teacher.coursedetails',compact('student','test','materials','subject'));
    }

    public function studentDetails($student,$course)
    {
         $student_id=$student;
        $test=$this->studentTest($student,$course);
        $allTest=$this->allTest($student,$course);
       // dd($test);

        $materials=$this->studentMaterials($student,$course);
        $allMaterial=$this->allMaterial($course);
       // dd($allMaterial);
//dd($materials);
        $student=$this->getStudent($student);
        

        //  dd($test);
        return view('teacher.studentdetails',compact('test','allTest','student','student_id','materials','allMaterial','subject'));
    }

    public function addToStudentTest(Request $request){
        //return json_encode($request->all());
       $prevTest=test::find($request->all()['test_id']);
      // return json_encode($prevTest->topic);
       $fix=new test;
       $fix->topic=$prevTest->topic;
       $fix->question_no=$prevTest->question_no;
       $fix->time=$prevTest->time;
       $fix->student_id=$request->all()['student'];
       $fix->teachers_id=Auth::user()->id;
       $fix->subject=$prevTest->subject;
       $fix->name=$prevTest->name;
       $fix->status=0;
       $fix->save();
       return json_encode([$request->all()['test_id'],$fix]);
       
    }

    public function addToStudentMaterial(Request $request){
        //return json_encode($request->all());
        $fix=new studentmaterial;
       //return json_encode($fix);
        $fix->material_id=$request->all()['matid'];
         
         $fix->student_id=$request->all()['student'];

        // return json_encode($fix->student_id);
        $fix->teacher_id=Auth::user()->id;

        $fix->subject_id=$request->all()['subject'];
        $fix->save();
        $get=material::find($request->all()['matid']);

       // return json_encode($request->all()['matid']);

        return json_encode([$request->all()['matid'],$get]);
       
    }

    public function createTest($subject)
    {

      session(['curr_test_subject'=>null]);
        session(['curr_test_name'=>null]);
        session(['curr_test_topic'=>null]);
        session(['curr_test_id'=>null]);
        session(['testName'=>null]);

      return view('teacher.createtest',compact('subject'));

    }

    public function storeTest(Request $request)
    { 

       // return json_encode($request->all());
        $ques=new questionbank;

        $ques->question=$request->all()['question'];
        $ques->a=$request->all()['optiona'];
        $ques->b=$request->all()['optionb'];
        $ques->c=$request->all()['optionc'];
        $ques->d=$request->all()['optiond'];

        if($request->all()['germanAns'] == null)
        {
          //that means it is option based
          $ques->ans=$request->all()['ans'];
          $ques->type="options";

        }
        else{
          $ques->ans=$request->all()['germanAns'];
          $ques->type="german";
         // return json_encode($ques);
        }
 
        $ques->teachers_id=Auth::user()->id;
        $ques->test_id=session('curr_test_id');
        $ques->topic="nothing for now";

        $ques->save();

        return back()->with(['success'=>'Question added successfully.You now have this number of questions in this folder']);
    }

    public function addMaterial($course)
    {
      return view('teacher.addmaterial',compact('course'));
    }

    public function fixAddMaterials(Request $request,$course)
    {
      $material=new material;
      $material->title=$request->all()['title'];
      $material->topics=$request->all()['topics'];
      $material->type=$request->all()['type'];
      $material->is_public=1;
      $material->course=$course;
      $material->class=$request->all()['class'];
      $material->location=$request->all()['file'];

      $material->save();

      return back()->with(['success'=>'you have successfully added a material, the code to track it is '.$material->id]);




    }

    public function viewAllMaterialForCourse($course)
    { 

     // dd(Storage::get('public/pdf/1PAD4ABPtxBoDByu9XLcT1QySM6qXszKEjJ0a2YY.jpeg'));
      $materials=$this->allMaterial($course);
      return view('teacher.viewallcoursematerials',compact('course','materials'));
    }

    public function viewFile($file)
    {
     
      $file=material::find($file);
    //   dd($file);
      return response()->file(asset('storage/'.$file->location));
    }

    public function saveTestName(Request $request)
    { 
     // return $this->teacherHaveSetTestBefore($request->all());
      if($this->teacherHaveSetTestBefore($request->all()))
      {
        return json_encode(['status'=>'false']);
        exit();
      }
     // return json_encode($request->all());
      $test=new test;
      $test->teachers_id=Auth::user()->id;
      $test->status='sample';
      $test->name=$request->all()['name'];
      $test->subject=$request->all()['subject'];
      $test->topic=$request->all()['topic'];
      $test->time=$request->all()['time'];
      $test->question_no=$request->all()['question'];
     // return json_encode($test);
      if($test->save()){
        session(['curr_test_subject'=>$request->all()['subject']]);
        session(['curr_test_name'=>$test->name]);
        session(['curr_test_topic'=>$test->topic]);
        session(['curr_test_id'=>$test->id]);
        session(['testName'=>true]);

        return json_encode(['status'=>'done','subdetails'=>subject::find($request->all()['subject']),'testdetails'=>$test]);
      }


      
      // return json_encode($request->all());
    }

    public function teacherHaveSetTestBefore($data)
    {

      //var_dump($data);
     // return json_encode($data);
     $get=test::where([
                          ['teachers_id','=',Auth::user()->id],
                          ['name','=',$data['name']],
                          ['subject','=',$data['subject']]
                      ])
                ->first();

               // return json_encode($get);

                if($get == null)
                {
                  return false;
                }
                else{
                   return true;
                }

    
    }

    public function viewAllTest()
    {//i use sample to filter those that the teacher added freshly without attaching any student
     $tests=test::where([['status','=','sample'],['teachers_id','=',Auth::user()->id]])->get();
     //dd($tests);
     return view('teacher.viewalltest',compact('tests'));
    }

    public function  removeTestFromStudentList($test_id)
    {
       /// $fix=test::where('id',$test_id->id);
      $fix=test::find($test_id);
       $fix->delete();
       // $fix->delete();
        return back()->with(['test_delete_success'=>'test removed from student list']);
    }




}
