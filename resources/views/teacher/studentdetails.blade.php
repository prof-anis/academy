@extends('layout.teacher')

@section('content')

<div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="panel-title">Portlet One
                            </div>
                            <div class="panel-controls">
                              <ul>
                                <li><a data-toggle="close" class="portlet-close" href="#"><i class="portlet-icon portlet-icon-close"></i></a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="panel-body">
                            <h3>
											<span class="semi-bold">Picture</h3>
                            <p>
                            	<div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="panel-title">Portlet One
                            </div>
                            <div class="panel-controls">
                              <ul>
                                <li><a data-toggle="close" class="portlet-close" href="#"><i class="portlet-icon portlet-icon-close"></i></a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="panel-body">
                            <h3>
											<span class="semi-bold">Without</span> Scroll</h3>
                            <p>When it comes to digital design, the lines between functionality, aesthetics, and psychology are inseparably blurred. Without the constraints of the physical world, there’s no natural form to fall back on, and every bit of constraint and affordance</p>
                          </div>
                        </div>
                      </div>



                      <div class="col-md-8">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="panel-title">Portlet One
                            </div>
                            <div class="panel-controls">
                              <ul>
                                <li><a data-toggle="close" class="portlet-close" href="#"><i class="portlet-icon portlet-icon-close"></i></a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="panel-body">
                            <h3>
											<span class="semi-bold">Student details</h3>
                            <p>
                              
                              NAME: {{ucfirst($student->name)}} <br>
                              CLASS:  {{$student->class}} <br>
                              GENDER: {{$student->gender}} <br>
                              COUNTRY: {{$student->country}}<br>
                              STATE : {{$student->state}} <br>
                              Email: {{$student->email}} <br>


                            </p>
                          </div>
                        </div>
                      </div>



                      <div class="col-md-12">
                      	<div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="panel-title">Portlet One
                            </div>
                            <div class="panel-controls">
                              <ul>
                                <li><a data-toggle="close" class="portlet-close" href="#"><i class="portlet-icon portlet-icon-close"></i></a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="panel-body">
                            <h3>
											<span class="semi-bold">Tests</h3>
                            <p><div class="col-md-12">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">Pages condensed Table
                    </div>
                    <div class="tools">
                      <a class="collapse" href="javascript:;"></a>
                      <a class="config" data-toggle="modal" href="#grid-config"></a>
                      <a class="reload" href="javascript:;"></a>
                      <a class="remove" href="javascript:;"></a>
                    </div>
                  </div>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <div id="condensedTable_wrapper" class="dataTables_wrapper form-inline no-footer"><table class="table table-hover table-condensed dataTable no-footer" id="condensedTable" role="grid">
                        <thead>
                          <tr role="row"><th style="width:20%" class="sorting_asc" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending">Topic</th><th style="width: 113px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Key: activate to sort column ascending">status</th><th style="width: 163px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">details</th>
                          	<th style="width: 163px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">Actions</th></tr>
                        </thead>
                        <tbody id="testbody">
                          
                          
                          <p>@if(session('test_delete_success') !== null)

                            {{session('test_delete_success')}}

                            @endif
                          </p>
                          
                          @forelse($test as $eachTest)
                        <tr role="row" class="odd">
                            <td class="v-align-middle semi-bold sorting_1">{{$eachTest['name']}}</td>
                            <td class="v-align-middle">
                            	@if($eachTest['status'] == 0)
                            	Not done
                            	@else
                            	Done <br>
                            	<span>score: {{$eachTest['score']}}</span>
                            	@endif
                            </td>
                            <td class="v-align-middle semi-bold">
                            	<span>Questions: {{$eachTest['question_no']}}</span><br>
                            	<span>Time: {{$eachTest['time']}}</span>
                            </td>
                              <td class="v-align-middle semi-bold">
                              	<a href="{{route('removetest@student',['testid'=>$eachTest['id']])}}"><span class="fa fa-remove"></span></a>
                              	@if($eachTest['status'] == 1)
                              	<span>Review</span>
                              	@endif
                            </td>
                         
                          </tr>
                          @empty
                          no test 
                          @endforelse

                      </tbody>
                      </table></div>
                    </div>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>
                            	<div>
                            		<br><br>
                            		<button class="btn btn-primary" id="addtest">Add new </button>
                            	</div>
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="panel-title">Portlet One
                            </div>
                            <div class="panel-controls">
                              <ul>
                                <li><a data-toggle="close" class="portlet-close" href="#"><i class="portlet-icon portlet-icon-close"></i></a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="panel-body">
                            <h3>
											<span class="semi-bold">Materials</h3>
                            <p>
                            	<div class="col-md-12">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">Pages condensed Table
                    </div>
                    <div class="tools">
                      <a class="collapse" href="javascript:;"></a>
                      <a class="config" data-toggle="modal" href="#grid-config"></a>
                      <a class="reload" href="javascript:;"></a>
                      <a class="remove" href="javascript:;"></a>
                    </div>
                  </div>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <div id="condensedTable_wrapper" class="dataTables_wrapper form-inline no-footer"><table class="table table-hover table-condensed dataTable no-footer" id="condensedTable" role="grid">
                        <thead>
                          <tr role="row"><th style="width:30%" class="sorting_asc" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending">Title</th><th style="width: 113px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Key: activate to sort column ascending">type</th></tr>
                        </thead>
                        <tbody id="matbody">
                          
                          
                          
                          
                          @forelse($materials as $mat)
                        <tr role="row" class="odd">
                            <td class="v-align-middle semi-bold sorting_1">{{$mat['title']}}</td>
                            <td class="v-align-middle">{{$mat['type']}}</td>
                          
                          </tr>
                      @empty
                      @endforelse
                  </tbody>
                      </table></div>
                    </div>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>

                            	<div>
                            		<button class="btn btn-primary" id="matview">Add new </button>
                            	</div>
                            </p>
                          </div>
                        </div>
                      </div>
                      </div>
                            </p>
                          </div>
                        </div>
                      </div>


                     



          <!-- Modal -->
          <div class="modal fade slide-right disable-scroll" id="TestModalSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog ">
              <div class="modal-content-wrapper">
                <div class="modal-content">
                 
                     <div class="col-md-12">
              
                    	  <!-- START PANEL -->

                <div class="panel panel-transparent">
                 
                  <div class="panel-body">
                   <a href="" class="btn btn-primary">Create new test</a>
                    <div class="table-responsive">
                      <div id="condensedTable_wrapper" class="dataTables_wrapper form-inline no-footer"><table class="table table-hover table-condensed dataTable no-footer" id="condensedTable" role="grid">
                        <thead>
                          <tr role="row"><th style="width:30%" class="sorting_asc" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending">Topic</th><th style="width: 113px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Key: activate to sort column ascending">Details</th><th style="width: 163px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">Action</th></tr>
                        </thead>
                        <tbody>
                          
                          
                          
                          
                          @forelse($allTest as $test)
                        <tr role="row" class="odd"  id={{$test['id']}}>
                            <td class="v-align-middle semi-bold sorting_1">{{$test['name']}}</td>
                            <td class="v-align-middle">Time : {{$test['time']}}  <br>
                            	Questions : {{$test['question_no']}}
                            </td>
                            <td class="v-align-middle semi-bold">
                            	<button class="btn btn-primary testpublish" testid={{$test['id']}} teststudent={{$student_id}}>Publish</button>
                            </td>
                          </tr>
                          @empty
                          <p>no active test</p>
                          @endforelse

                      </tbody>
                      </table></div>
                    </div>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>

                      </div>
                  
                  </div>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
          </div>




           <!-- Modal -->
          <div class="modal fade slide-right disable-scroll" id="MaterialModalSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog ">
              <div class="modal-content-wrapper">
                <div class="modal-content">
                 
                     <div class="col-md-12">
              
                    	  <!-- START PANEL -->

                <div class="panel panel-transparent">
                 
                  <div class="panel-body">
                   <a href="" class="btn btn-primary">add new material</a>
                    <div class="table-responsive">
                      <div id="condensedTable_wrapper" class="dataTables_wrapper form-inline no-footer"><table class="table table-hover table-condensed dataTable no-footer" id="condensedTable" role="grid">
                        <thead>
                          <tr role="row"><th style="width:30%" class="sorting_asc" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending">Title</th><th style="width: 113px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Key: activate to sort column ascending">type</th><th style="width: 163px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">Action</th>
                          	<th style="width: 163px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">Class</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          
                          
                          
                          @forelse($allMaterial as $mat)
                        <tr role="row" class="odd"  id=mat{{$mat['id']}}>
                            <td class="v-align-middle semi-bold sorting_1">{{$mat['title']}}</td>
                            <td class="v-align-middle">
                            	{{$mat['type']}}
                            </td>
                             <td class="v-align-middle">
                            	{{$mat['class']}}
                            </td>
                            <td class="v-align-middle semi-bold">
                            	<button class="btn btn-primary matpublish" matid={{$mat['id']}} matstudent={{$student_id}} matsubject="{{$mat['course']}}">Publish</button>
                            </td>
                          </tr>
                          @empty
                          <p>no active test</p>
                          @endforelse

                      </tbody>
                      </table></div>
                    </div>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>

                      </div>
                  
                  </div>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
          </div>



            <script src="{{asset('student/assets/vendors/js/base/jquery.min.js')}}"></script>
          <script type="text/javascript">
          	
          	$(document).ready(function(){
          		$('#matview').click(function(){
          			$('#MaterialModalSlideUp').modal();
          		})

          		$('.matpublish').each(function(){
          			$(this).click(function(){
          				var student=$(this).attr('matstudent');
          				var matid=$(this).attr('matid');
          				var course=$(this).attr('matsubject');
          				var _token="{{csrf_token()}}";
          				var data={_token:_token,matid:matid,student:student,subject:course};
          				var url="{{route('add@material_teacher')}}";
          				$.post(url,data,function(info){
          					alert(info);
          					var msg=JSON.parse(info);
          					var info=msg[0];
          					$('#mat'+info).remove();
          					var html='    <tr role="row" class="odd"> <td class="v-align-middle semi-bold sorting_1">'+msg[1].title+'</td><td class="v-align-middle">'+msg[1].type+'</td><td class="v-align-middle semi-bold">Wonders can be true. Believe in your ff </td></tr>';
          					$('#matbody').append(html);

          				})
          			})
          		})
          		$('#addtest').click(function(){
          			$('#TestModalSlideUp').modal('show');
          		})

          		$('.testpublish').each(function(){
          			$(this).click(function(){
          				var test_id=$(this).attr('testid');
          				var student=$(this).attr('teststudent');
          				var url="{{route('add@test_teacher')}}";
          				var token="{{csrf_token()}}"
          				var data={test_id:test_id,_token:token,student:student};

          				$.post(url,data,function(info){
          					

          					var msg=JSON.parse(info);
          					var info=msg[0];
          					var html=' <tr role="row" class="odd"> <td class="v-align-middle semi-bold sorting_1">'+ msg[1].name +'</td> <td class="v-align-middle">not done</td>  <td class="v-align-middle semi-bold"><span>Questions:'+msg[1].question_no+ '</span><br><span>Time:'+ msg[1].time + '</span></td> <td class="v-align-middle semi-bold">	<span class="fa fa-remove"></span>	</td>';

          					$('#testbody').append(html);


          					$('.testpublish').each(function(){
          						if($(this).attr('testid')==info)
          						{
          							$("#"+info).remove();
          						}
          					})
          				})
          			})
          		})
          	})

          </script>
        
                           
@endsection