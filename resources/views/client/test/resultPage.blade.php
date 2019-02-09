@extends('layout.admin_remove')



@section('content')

<div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                      <div class="panel-heading separator">
                        <div class="panel-title">My result
                        </div>
                      </div>
                      <div class="panel-body">
                      	<center>
                        <h3>
									<span class="semi-bold">Done and Dusted!!!</h3>
                        <p>
                        	your score:<br>
                        	<h1>{{$score}}</h1>
                        	<br>
                        	<a href="{{route('student@home')}}" class="btn btn-primary">My Dashboard</a>

                        </p>
                    </center>
                      </div>
                    </div>
                  </div>

@endsection