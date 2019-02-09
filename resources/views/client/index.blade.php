@extends('layout.admin')



@section('content')

<h1>Welcome {{App\Http\Controllers\Student\Activities::getStudent()->name}}</h1>
<div class="col-md-12">
	<div class="col-md-4 m-b-10">
                    <!-- START WIDGET D3 widget_graphTileFlat-->
                    <div class="widget-8 panel no-border bg-success no-margin widget-loader-bar">
                      <div class="container-xs-height full-height">
                        <div class="row-xs-height">
                          <div class="col-xs-height col-top">
                            <div class="panel-heading top-left top-right">
                              <div class="panel-title text-black hint-text">
                                <span class="font-montserrat fs-11 all-caps">Active test<i class="fa fa-chevron-right"></i>
                                                    </span>
                              </div>
                              <div class="panel-controls">
                                <ul>
                                  <li>
                                    <a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row-xs-height ">
                          <div class="col-xs-height col-top relative">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="p-l-20">
                                  <h5 class="no-margin p-b-5 text-white">@if(count($activeTest)<1)
                                  	You do not have any active test yet
                                  	@else
                                  	{{count($activeTest)}}
                                  	@endif
                                  </h5>
                                  <p class="small hint-text m-t-5">
                                     </p>
                                </div>
                              </div>
                              <div class="col-sm-6">
                              </div>
                            </div>
                            <div class="widget-8-chart line-chart" data-line-color="black" data-points="true" data-point-color="success" data-stroke-width="2">
                              <svg></svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- END WIDGET -->
                  </div>




                  <div class="col-md-4 m-b-10">
                    <!-- START WIDGET widget_progressTileFlat-->
                    <div class="widget-9 panel no-border bg-primary no-margin widget-loader-bar">
                      <div class="container-xs-height full-height">
                        <div class="row-xs-height">
                          <div class="col-xs-height col-top">
                            <div class="panel-heading  top-left top-right">
                              <div class="panel-title text-black">
                                <span class="font-montserrat fs-11 all-caps">Materials<i class="fa fa-chevron-right"></i>
                                                    </span>
                              </div>
                              <div class="panel-controls">
                                <ul>
                                  <li><a href="#" class="portlet-refresh text-black" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row-xs-height">
                          <div class="col-xs-height col-top">
                            <div class="p-l-20 p-t-15">
                              <h5 class="no-margin p-b-5 text-white">
                              		@if(count($material)<1)
                                  	You do not have any active material 
                                  	@if(count($courses)>0)
                                  	except for general materials
                                  	@endif
                                  	@else
                                  	{{count($material)}}
                                  	@endif

                              </h5>
                             
                               </div>
                          </div>
                        </div>
                        <div class="row-xs-height">
                          <div class="col-xs-height col-bottom">
                            <div class="progress progress-small m-b-20">
                              <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                              <div class="progress-bar progress-bar-white" style="width:45%"></div>
                              <!-- END BOOTSTRAP PROGRESS -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- END WIDGET -->
                  </div>




                  <div class="col-md-4">
                    <!-- START WIDGET widget_statTile-->
                    <div class="widget-10 panel no-border bg-white no-margin widget-loader-bar">
                      <div class="panel-heading top-left top-right ">
                        <div class="panel-title text-black hint-text">
                          <span class="font-montserrat fs-11 all-caps">courses <i class="fa fa-chevron-right"></i>
                                        </span>
                        </div>
                        <div class="panel-controls">
                          <ul>
                            <li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="panel-body p-t-40">
                        <div class="row">
                          <div class="col-sm-12">
                            <h4 class="no-margin p-b-5 text-danger semi-bold">
                            		@if(count($courses)<1)
                                  	You do not have not registered for any course
                                  	@else
                                  	{{count($courses)}}
                                  	@endif
                            </h4>
                            
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <div class="p-t-10 full-width">
                          <a href="#" class="btn-circle-arrow b-grey"><i class="pg-arrow_minimize text-danger"></i></a>
                          <span class="hint-text small">Show more</span>
                        </div>
                      </div>
                    </div>
                    <!-- END WIDGET -->
                  </div>
</div>

<div class="col-md-6 m-b-10">
                    <div class="ar-3-2 widget-1-wrapper">
                      <!-- START WIDGET widget_imageWidget-->
                      <div class="widget-1 panel no-border bg-complete no-margin widget-loader-circle-lg">
                        <div class="panel-heading top-right ">
                          <div class="panel-controls">
                            <ul>
                              <li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh-lg-master"></i></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="panel-body">
                          <div class="pull-bottom bottom-left bottom-right ">
                            <span class="label font-montserrat fs-11">NEWS</span>
                            <br>
                            <h2 class="text-white">You can get latest information from us here</h2>
                            <p class="text-white hint-text">we are delighted to have you.</p>
                            <div class="row stock-rates m-t-15">
                              <div class="company col-xs-4">
                                <div>
                                  <p class="font-montserrat text-success no-margin fs-16">
                                    <i class="fa fa-caret-up"></i> +0.95%
                                    <span class="font-arial text-white fs-12 hint-text m-l-5">546.45</span>
                                  </p>
                                  <p class="bold text-white no-margin fs-11 font-montserrat lh-normal">
                                    AAPL
                                  </p>
                                </div>
                              </div>
                            
                              <div class="company col-xs-4">
                                <div class="pull-right">
                                  <p class="font-montserrat text-success no-margin fs-16">
                                    <i class="fa fa-caret-up"></i> +0.95%
                                    <span class="font-arial text-white fs-12 hint-text m-l-5">278.87</span>
                                  </p>
                                  <p class="bold text-white no-margin fs-11 font-montserrat lh-normal">
                                    PAGES
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- END WIDGET -->
                    </div>
                  </div>

                  
@endsection