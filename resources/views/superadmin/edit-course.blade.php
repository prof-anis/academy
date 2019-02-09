@extends('layout.superadmin')

@section('content')

@if(session('update_success') !== null)
<div class="col-md-12">
	<p style="color: green">{{session('update_success')}}</p>
</div>
@endif


<form action="{{route('admin.courseupdate',['course'=>$course->id])}}" method="POST">
	{{csrf_field()}}
					<div class="form-group form-group-default required">
                        <label>Subject Name</label>
                        <input class="form-control" required="" type="text" name="name" value="{{$course->subject}}">
                      </div>

                      <div class="form-group form-group-default required">
                        <label>Class</label>
                        <select class="form-control" name="class" value="{{$course->class}}">
                        	
                        	<option value="ss1">ss1</option>
                        	<option value="ss2">ss2</option>
                        	<option value="ss3">ss3</option>


                        </select>
                      </div>



                      <div class="form-group form-group-default required">
                        <label>cost</label>
                        <input class="form-control" required="" type="number" name="cost" value="{{$course->cost}}">
                      </div>

                      <div class="form-group form-group-default required">
                        <label>Duration</label>
                        <input class="form-control" required="" type="text" name="duration" value="{{$course->duration}}">
                      </div>

                      <div class="col-md-12">
                      <center>
                      	
                  
                        <input class="btn btn-primary" required="" type="submit" value="Edit">
                    </center>
                      </div>





</form>


@endsection