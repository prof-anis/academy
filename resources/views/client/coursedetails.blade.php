@extends('layout.admin')



@section('content')
<div class="col-md-12">
                <div class="alert alert-info visible-xs m-r-5 m-l-5" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Info: </strong> On mobile the tab will be come a Accorian by using data-init-reponsive-tabs="collapse"
                </div>
                <div class="panel">
                  <ul class="nav nav-tabs nav-tabs-simple hidden-xs" role="tablist" data-init-reponsive-tabs="collapse">
                    <li class="active"><a href="#tab2hellowWorld" data-toggle="tab" role="tab" aria-expanded="true">Hello World</a>
                    </li>
                    <li class=""><a href="#tab2FollowUs" data-toggle="tab" role="tab" aria-expanded="false">General Materials</a>
                    </li>
                  
                  </ul><div class="panel-group visible-xs" id="qApSM-accordion"></div>
                  <div class="tab-content hidden-xs">
                    <div class="tab-pane active" id="tab2hellowWorld">
                      <div class="row column-seperation">
                       
                      <div class="row">
                      <div class="col-md-4">
                        <div data-pages="portlet" class="panel panel-default" id="portlet-basic">
                          <div class="panel-heading ">
                            <div class="panel-title">specific pdf
                            </div>
                            <div class="panel-controls">
                             
                            </div>
                          </div>
                          <div class="panel-body">
                            <h3>
                                            <span class="semi-bold">PDF({{count($teacherMat['pdf'])}})</h3>
                            <p>pdf are specially designed to give u the best of it ....
                                <br>
                                <a href="{{route('material@details',['type'=>'pdf','course'=>$course,'specific'=>1])}}" class="btn btn-success">View All</a>
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="panel-title">specific video
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
                                            <span class="semi-bold">Video ({{count($teacherMat['video'])}})</h3>
                            <p>When it comes to digital design, the lines between functionality, aesthetics, and psychology are inseparably blurred. Without the constraints of the physical world, there’s no natural form to fall back on, and every bit of constraint and affordance
                            
                            <br>
                         <a href="{{route('material@details',['type'=>'video','course'=>$course,'specific'=>1])}}" class="btn btn-success">View All</a>
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="panel-title">Specific audio
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
                                                    <span class="semi-bold">Audio({{count($teacherMat['audio'])}})</h3>
                                <p>When it comes to digital design, the lines between functionality, 
                                    <br>
                                     <a href="{{route('material@details',['type'=>'audio','course'=>$course,'specific'=>1])}}" class="btn btn-success">View All</a>
                                </p>
                              </div>
                            </div><div class="scroll-element scroll-x scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="width: 89px;"></div></div></div><div class="scroll-element scroll-y scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="height: 62px; top: 0px;"></div></div></div></div>
                          </div>
                        </div>
                      </div>
                    </div>


                      </div>
                    </div>
                    <div class="tab-pane" id="tab2FollowUs">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="row">
                      <div class="col-md-4">
                        <div data-pages="portlet" class="panel panel-default" id="portlet-basic">
                          <div class="panel-heading ">
                            <div class="panel-title">General PDF
                            </div>
                            <div class="panel-controls">
                             
                            </div>
                          </div>
                          <div class="panel-body">
                            <h3>
                                            <span class="semi-bold">Pdf({{count($general['pdf'])}})</h3>
                            <p>Basic Portlet tools include a slide toggle button <i class="portlet-icon portlet-icon-collapse"></i>, refresh button <i class="portlet-icon portlet-icon-refresh"></i> and a close button <i class="portlet-icon portlet-icon-close"></i> All these are fully customizable and come with callback functions to integrate with your code. Clicking on the refresh button will simulate an AJAX call.
                                <br>
                                 <a href="{{route('material@details',['type'=>'pdf','course'=>$course])}}" class="btn btn-success">View All</a>
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="panel-title">General Video
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
                                            <span class="semi-bold">video ({{count($general['video'])}})</h3>
                            <p>When it comes to digital design, the lines between functionality, aesthetics, and psychology are inseparably blurred. Without the constraints of the physical world, there’s no natural form to fall back on, and every bit of constraint and affordance
                                <br>
                                <a href="{{route('material@details',['type'=>'video','course'=>$course])}}" class="btn btn-success">View All</a>
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="panel-title">General Audio
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
                                                    <span class="semi-bold">Audio({{count($general['audio'])}})</h3>
                                <p>When it comes to digital design, the lines between functionality, aesthetics, and psychology are inseparably blurred. Without the constraints of the physical world, there’s no natural form to fall back on, and every bit of 
                                    <br>
                                      <a href="{{route('material@details',['type'=>'audio','course'=>$course])}}" class="btn btn-success">View All</a>
                                </p>
                              </div>
                            </div><div class="scroll-element scroll-x scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="width: 89px;"></div></div></div><div class="scroll-element scroll-y scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="height: 62px; top: 0px;"></div></div></div></div>
                          </div>
                        </div>
                      </div>
                    </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab2Inspire">
                      <div class="row">
                        <div class="col-md-12">
                          <h3>Follow us &amp; get updated!</h3>
                          <p>Instantly connect to what's most important to you. Follow your friends, experts, favorite celebrities, and breaking news.</p>
                          <br>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

@endsection