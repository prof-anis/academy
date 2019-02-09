@extends('layout.superadmin')

@section('content')

@if(session('create_success') !== null)

<div class="col-md-12">
	<p style="color: green">{{session('create_success')}}</p>
</div>

@endif

<form action="{{route('admin.addcourse')}}" method="POST">
	{{csrf_field()}}
					<div class="form-group form-group-default required">
                        <label>Subject Name</label>
                        <input class="form-control" required="" type="text" name="name">
                      </div>

                      <div class="form-group form-group-default required">
                        <label>Class</label>
                        <select class="form-control" name="class">
                        	
                        	<option value="ss1">ss1</option>
                        	<option value="ss2">ss2</option>
                        	<option value="ss3">ss3</option>


                        </select>
                      </div>


                      <div class="form-group form-group-default required">
                        <label>cost</label>
                        <input class="form-control" required="" type="number" name="cost">
                      </div>

                      <div class="form-group form-group-default required">
                        <label>Duration</label>
                        <input class="form-control" required="" type="text" name="duration">
                      </div>


                      <div class="col-md-12">
                      <center>
                      	
                  
                        <input class="btn btn-primary" required="" type="submit" value="Add">
                    </center>
                      </div>





</form>


@endsection