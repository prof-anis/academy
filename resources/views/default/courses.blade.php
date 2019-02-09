@extends('layout.default')

@section('content')


<div class="box_style_1">
                		<div class="indent_title_in">
                   
				<h3>Courses</h3>
			
			</div>
            	<div class="wrapper_indent">
                        <p></p>
						<div class="row">
                        	<div class="col-md-12">
                            	<ul class="list_3">
                            		@foreach($courses as $course)
                                    <li><strong>{{$course['subject']}}</strong><p>{{$course['cost']}}  |  {{$course['classification']}} | {{$course['duration']}}</p></li>
                                    @endforeach
                                   
                                </ul>
                            </div>
                           
                        </div><!-- End row--> 
                </div><!--wrapper_indent -



@endsection