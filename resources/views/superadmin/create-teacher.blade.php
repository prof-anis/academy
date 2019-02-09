@extends('layout.superadmin')


@section('content')

@if(session('create_success') !== null)
<div class="col-md-12">
	<p style="color: green">{{session('create_success')}}</p>
</div>
@endif
	<form method="POST" action="{{route('admin.storeteacher',['id'=>$teacher->id])}}">
		{{csrf_field()}}
					<div class="form-group form-group-default required">
                        <label>Email</label>
                        <input class="form-control" required="" type="text" name="email" value="{{$teacher->email}}">
   
                      </div>

                    
				  <div class="form-group form-group-default form-group-default-select2">
                        <label>Subjects Attached</label>
                        <select class=" full-width" data-init-plugin="select2" multiple name="subject" id="multiselect" link="">
                          @foreach($allCourse as $course)
                          <option value="{{$course['id']}}"  >{{$course->subject}} | class {{$course->class}}</option>
                          @endforeach
                        </select>
                      </div>



                      <div class="col-md-12">
                      	<center>
                      	<input type="submit" name="" value="Send Contract to tutor" class="btn btn-primary" id="submitbutton">

                      </center>
                      	
                      </div>

    <script src={{asset("client/assets/plugins/jquery/jquery-1.11.1.min.js")}} type="text/javascript"></script>
<script type="text/javascript">



</script>



@endsection