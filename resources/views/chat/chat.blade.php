@extends('layout.admin_remove')

@section('content')

<div class="col-md-12">
                    <div id="portlet-linear" class="panel panel-default">
                      <div class="panel-heading ">
                      
                        <div class="panel-controls">
                          <ul>
                            <li><a href="#" class="portlet-collapse" data-toggle="collapse"><i class="portlet-icon portlet-icon-collapse"></i></a>
                            </li>
                            <li><a href="#" class="portlet-refresh" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                            </li>
                            <li><a href="#" class="portlet-close" data-toggle="close"><i class="portlet-icon portlet-icon-close"></i></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="panel-body">
                        <h3>
									<span class="semi-bold">My Chat</h3>
                        <p>
                        	<div class="col-md-4">
                    <div id="portlet-linear" class="panel panel-default">
                      <div class="panel-heading ">
                        <div class="panel-title">My Friends
                        </div>
                     
                      </div>
                      <div class="panel-body" style="">
                       
                        <p>
                        	@forelse(Chat::getAllChatPeople() as $people)
                        	<div class="col-md-12 sm-no-padding people" id="people_{{$people['id']}}" friend_id="{{$people['id']}}">
                  <div class="panel panel-transparent">
                    <div class="panel-body no-padding">
                      <div id="portlet-advance" class="panel panel-default">
                       
                        <div class="panel-body">
                        
						
                       
                          <div>
                            <div class="profile-img-wrapper m-t-5 inline">
                              <img width="35" height="35" alt="" src="{{asset('client/assets/img/profiles/avatar_small.jpg')}}">
                              <div class="chat-status available">
                              </div>
                            </div>
                            <div class="inline m-l-10">
                              <p class="small hint-text m-t-5">{{$people['email']}}
                                <span id="currChatPerson" id="{{$people['email']}}"></span>
                                <br>for UI/UX at REVOX</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @empty
                @endforelse
                        </p>
                      </div>
                    </div>
                  </div>




                  <div class="col-md-8"  style="position: static;">
                    <div id="portlet-linear" class="panel panel-default">
                      <div class="panel-heading ">
                        <div class="panel-title" id="whoChat" whoChatId="">Portlet Title
                         
                        </div>
                        <div class="panel-controls">
                          <ul>
                            <li><a href="#" class="portlet-collapse" data-toggle="collapse"><i class="portlet-icon portlet-icon-collapse"></i></a>
                            </li>
                            <li><a href="#" class="portlet-refresh" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                            </li>
                            <li><a href="#" class="portlet-close" data-toggle="close"><i class="portlet-icon portlet-icon-close"></i></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="panel-body">
                        <h3>
									<span class="semi-bold" >real chat</h3>
                        <div >
                        	<div id="chatbox">
                  <div class="col-md-12"><div class="alert alert-info bordered pull-left col-md-6" role="alert">
                      <p class="pull-left"><strong>Info:</strong> You have 198 messages</p>
                       <div class="clearfix"></div>
                    </div>
                </div>
                        	
                <div class="col-md-12">
                	 <div class="alert alert-info bordered pull-right col-md-6" role="alert">
                      <p class="pull-left"><strong>Info:</strong> You have 198 messages gcgkhjgljnbgvhanlkjhai hjdgjhahgklbduygdqkbhjadfujayaklnladhpaodq jgduialjd  djhbaukdhalfbajukgalfdw hjfdvagfdhjkasdjuay </p>
                       <div class="clearfix"></div>
                    </div>

                </div>
                    </div>


                	<div class="input-group">
                      <input type="text" class="form-control"  id="chatMessage">
                      <span class="input-group-addon primary"  id="chatButton">
                                
                                <i class="fa fa-send"></i> 
                            </span>
                    </div>
                        </div>
                      </div>
                    </div>
                  </div>



                        </p>
                      </div>
                    </div>
                  </div>

                      @include('chat.chatjs');

@endsection