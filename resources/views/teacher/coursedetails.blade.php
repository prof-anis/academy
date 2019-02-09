 @extends('layout.teacher')

@section('content')

<div class="col-md-12">
                        <div data-pages="portlet" class="panel panel-default" id="portlet-basic">
                          <div class="panel-heading ">
                            <div class="panel-title">
                            </div>
                            <div class="panel-controls">
                              <ul>
                                <li><a data-toggle="collapse" class="portlet-collapse" href="#"><i class="portlet-icon portlet-icon-collapse"></i></a>
                                </li>
                                <li><a data-toggle="refresh" class="portlet-refresh" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                </li>
                                <li><a data-toggle="close" class="portlet-close" href="#"><i class="portlet-icon portlet-icon-close"></i></a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="panel-body">
                            <h3>
											<span class="semi-bold">{{App\Http\Controllers\Student\Courses::getCourseById($subject)->subject}}</h3>
                            <p>
                            	<h4>Here are some details of your course</h4>
                              <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="panel-title">
                            </div>
                            <div class="panel-controls">
                              <ul>
                                <li><a data-toggle="close" class="portlet-close" href="#"><i class="portlet-icon portlet-icon-close"></i></a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="panel-body">
                            <div class="scroll-wrapper scrollable" style="position: relative;"><div class="scrollable scroll-content scroll-scrolly_visible" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 168px;">
                              <div class="demo-portlet-scrollable">
                                <h3>
                          <span class="semi-bold">Students ({{count($student)}})</h3>
                                <p>
                                  <ul>
                                  @forelse($student as $eachStudent)
                                  <li>{{$eachStudent['email']}} | <span class="badge"><a href="{{route('studentdetails@teacher',['student_id'=>$eachStudent['id'],'course'=>$subject])}}">view</a></span></li>
                                  @empty
                                  <li>You do not have any student for this course yet!</li>
                                  @endforelse
                                </p>
                              </div>
                            </div><div class="scroll-element scroll-x scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="width: 89px;"></div></div></div><div class="scroll-element scroll-y scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="height: 62px; top: 0px;"></div></div></div></div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="panel-title">
                            </div>
                            <div class="panel-controls">
                              <ul>
                                <li><a data-toggle="close" class="portlet-close" href="#"><i class="portlet-icon portlet-icon-close"></i></a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="panel-body">
                            <div class="scroll-wrapper scrollable" style="position: relative;"><div class="scrollable scroll-content scroll-scrolly_visible" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 168px;">
                              <div class="demo-portlet-scrollable">
                                <h3>
                          <span class="semi-bold">TESTS ({{count($test)}})</h3>
                                <p>
                                  @forelse($test as $eachTest)
                                  <li>{{$eachTest['name']}}</li>
                                  @empty
                                  <li>no active test yet</li>
                                  @endforelse
                                  <br>
                                  <div class="col-md-12">
                                    <center><a href="{{route('teacher.createtest',['subject'=>$subject])}}" class="btn btn-primary">Add new</a>
                                    <a href="{{route('viewalltest',['subject'=>$subject])}}" class="btn btn-success">View All</a>
                                  </center>
                                    
                                  </div>
                                </p>
                              </div>
                            </div><div class="scroll-element scroll-x scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="width: 89px;"></div></div></div><div class="scroll-element scroll-y scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="height: 62px; top: 0px;"></div></div></div></div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="panel-title">Portlet Two
                            </div>
                            <div class="panel-controls">
                              <ul>
                                <li><a data-toggle="close" class="portlet-close" href="#"><i class="portlet-icon portlet-icon-close"></i></a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="panel-body">
                            <div class="scroll-wrapper scrollable" style="position: relative;"><div class="scrollable scroll-content scroll-scrolly_visible" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 168px;">
                              <div class="demo-portlet-scrollable">
                                <h3>
                          <span class="semi-bold">Materials</h3>
                                <p>
                                  <li>PDF <span class="semi-bold">{{$materials['pdf']}}</span></li>
                                  <li>AUDIO <span class="semi-bold">{{$materials['audio']}}</span></li>
                                  <li>VIDEO <span class="semi-bold">{{$materials['video']}}</span> </li>
                                <br>
                                  <div class="col-md-12">
                                    <center><a href="{{route('addmaterial',['course'=>$subject])}}" class="btn btn-primary">Add new</a>
                                    <a href="{{route('allcoursematerials',['course'=>$subject])}}" class="btn btn-success">View All</a>
                                  </center>
                                    
                                  </div>
                                </p>
                              </div>
                            </div><div class="scroll-element scroll-x scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="width: 89px;"></div></div></div><div class="scroll-element scroll-y scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="height: 62px; top: 0px;"></div></div></div></div>
                          </div>
                        </div>
                      </div>
                            </p>
                          </div>
                        </div>
                      </div>


@endsection