@extends('layout.admin_remove')



@section('content')

<div class="col-md-6 col-md-offset-2 ">
                    <div class="panel panel-default">
                      <div class="panel-heading separator">
                        <div class="panel-title">Assessment
                        </div>
                      </div>
                      <div class="panel-body">
                        <h3>
                                    <span class="semi-bold">Assesment</h3>
                        <p>Welcome, you would be writing a quick assesment on {{$course_details->subject}}
                            <ol>
                                <li>ensure you are well prepared for the test</li>
                                <li>you have {{$test_id->question_no}} questions to answer</li>
                                <li>the time allocated for this test is {{$test_id->time}} minutes</li>
                            </ol>
                            <br>
                            <center><a  class="btn btn-primary" href="{{route('testpage',['id'=>$test_id->id])}}">Start</a></center>
                        </p>
                      </div>
                    </div>
                  </div>
@endsection