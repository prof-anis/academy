<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\subject;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
           $allCourse=subject::all();
        return view('superadmin.all_course',compact('allCourse'));
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
           return view('superadmin.create_new_course');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $juniorSchool=['js1','js2','js3'];
        $seniorSchool=['ss1','ss2','ss3'];

        $fix=new subject;
        $fix->subject=$request->all()['name'];
        $fix->class=$request->all()['class'];
        $fix->cost=$request->all()['cost'];
        $fix->duration=$request->all()['duration'];
        if(in_array($request->class, $juniorSchool))
        {
            $fix->classification='junior';
        }


         if(in_array($request->class, $seniorSchool))
        {
            $fix->classification='senior';
        }

        else{
            $fix->classification='basic';
        }



        if($fix->save())
        {
            return back()->with(['create_success'=>'successfully created.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $course=subject::findOrFail($id);

        return view('superadmin.edit-course',compact('course'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $course=subject::findOrFail($id);
        $course->subject=$request->all()['name'];
        $course->class=$request->all()['class'];
        $course->cost=$request->all()['cost'];
        $course->duration=$request->all()['duration'];

        if($course->update()){
            return back()->with(['update_success'=>'you have successfully updated your course, here is what you have now']);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fix=subject::findOrFail($id);
        $fix->delete();

        return back()->with(['delete_success'=>'course successfully deleted']);
    }
}
