@extends('layout.teacher')

@section('content')
@if(session('success') !== null)
{{session('success')}}
@endif
 <form method="POST" "  id="quesForm"  action="{{route('storetest')}}">

<div class="col-md-12">
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
							   <p>
                            	




                            		<div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">


                          	 <div class="form-group form-group-default required">
                            <label>Test Details</label>
                            <input type="text" class="form-control" value="{{session('curr_test_name')}}"  id="testName" name='testname' disabled="">
                            <input type="" value="{{session('curr_test_topic')}}"   name="" disabled="" id="testSubject" class="form-control">

                          </div>

                         

                            <div class="panel-title">QUESTION
                            </div>
                            <div class="panel-controls">
                              <ul>
                                <li><a data-toggle="close" class="portlet-close" href="#"><i class="portlet-icon portlet-icon-close"></i></a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="panel-body">
                               <p>
                            	
                            	<textarea class="form-control" rows="20" name='question'>
                            		


                            	</textarea>
                            	
                            </p>
                          </div>
                        </div>
                      </div>

                         		<div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="panel-title">Options
                            	<hr>
                            	<div class="btn-group">
                            		<button class="btn btn-primary" id="optionButton">Use Optional</button>
                            		<button class="btn btn-success" id="germanButton">Use German</button>
                            	</div>
                            </div>
                            <div class="panel-controls">
                              <ul>
                                <li><a data-toggle="close" class="portlet-close" href="#"><i class="portlet-icon portlet-icon-close"></i></a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="panel-body">
                         <p>

                         	<div id="options">
                         		      
                            	
                        <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>Option A</label>
                            <input type="text" class="form-control"  name="optiona">
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>Option B</label>
                            <input type="text" class="form-control"  name="optionb">
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>Option C</label>
                            <input type="text" class="form-control"  name="optionc">
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>Option D</label>
                            <input type="text" class="form-control"  name="optiond">
                          </div>
                        </div>

                        <div>
                        <input type="radio" class="col-md-3" name="ans"  value="a">
                        	<input type="radio"  class="col-md-3" name="ans"  value="b">
                        	<input type="radio"  class="col-md-3" name="ans"  value="c">
                           <input type="radio" class="col-md-3" name="ans"  value="d">
                        

                        </div>
                         	</div>

                         		<div id="german">
                         			
                         			 <div class="form-group form-group-default required">
                            <label>Answer</label>
                            <input type="text" class="form-control"  name="germanAns">
                          </div>
                         		</div>

                            <div class="col-md-12">
                              <input type="Submit" class="btn btn-primary" value="Submit" id="submitQues">
                              
                            </div>






                            	
                            </p>
                          </div>
                        </div>
                      </div>





                            </p>
                          </div>
                        </div>
                      </div>
                      {{csrf_field()}}

                      <input type="hidden" name="" name="subject" value="{{$subject}}">


                   </form>

    <script src={{asset("client/assets/plugins/jquery/jquery-1.11.1.min.js")}} type="text/javascript"></script>


    <script type="text/javascript">
    	

    	$(document).ready(function()
    	{		
       /* $('#submitQues').click(function(){
          var data=$('#quesForm').serializeArray();
          var url="{{route('storetest')}}";
          $.post(url,data,function(info){
            alert(info);
          })
        })*/
    		$('#german').hide();
    		$('#germanButton').click(function(e){
          e.preventDefault();
    			$('#options').hide('slow');
    			$('#german').show('slow');
    		})
    		$('#optionButton').click(function(e){
          e.preventDefault();
    			$('#german').hide('slow');
    			$('#options').show('slow');
    		})
    	})
    </script>

    @if(session('testName') == null)


 <!-- Modal -->
          <div class="modal fade slide-right disable-scroll" id="TestNameModal" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog ">
              <div class="modal-content-wrapper">
                <div class="modal-content">
                 
                     <div class="col-md-12">
              
                        <!-- START PANEL -->

                <div class="panel panel-transparent">
                 <h3>Set Up Your Test Here</h3>
                 <span id="loader"></span>
                 <form id="testSetUpForm" method="POST" action="#">
                 <p><b>NAME</b></p>
                 <input type="text" name="name" class="form-control">
                 <br>

                

                 <p><b>Time</b></p>
                 <input type="text" name="time" id='time' class="form-control">
                 <br>

                 <p><b>Question No</b></p>
                 <input type="text" name="question" id='t' class="form-control">
                 <br>

                 <p><b>Topic</b></p>
                 <input type="text" name="topic" id='testName' class="form-control">
                 <br>

                 <input type="hidden" name="subject" value="{{$subject}}">
                 {{csrf_field()}}
                 <div>
                 <button class="btn btn-primary" id='usename'>Submit</button>
               </div>
                
                </form>
                  
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











    <script type="text/javascript">
      $(document).ready(function(){
        $('#TestNameModal').modal('show');

        $('#usename').click(function(e){
          e.preventDefault();
          alert('i was clicked');
          var url="{{route('savetestname')}}";
          var token="{{csrf_token()}}";
          var data=$('#testSetUpForm').serializeArray();
         // console.log(data);
         // var data={_token:token,subject:subject};
          $.post(url,data,function(info){
            var msg=JSON.parse(info);
            console.log(msg);
            if(msg.status == "done")
            {
              alert('Great, you can now start adding questions to your test.');
              $('#testName').val(msg.testdetails.name);
              $('#testSubject').val(msg.subdetails.subject);
            }
            else{
              alert('test already set ');
            }
          })
        })
      })

      $(document).ajaxStart(function(){
        $('#loader').html('waiting...');
      })
          </script>



    @endif
@endsection