@extends('layout.admin')



@section('content')
<div class="alert alert-success" role="alert">
                      <button class="close" data-dismiss="alert"></button>
                      Here are the list of courses available for your class
                    </div>
<div class="col-md-12">
  <input type="text" id="myInput" class="form-control" id="">
  <br>
</div>
<div class="col-md-12">
  <button class="col-md-2 btn btn-primary" id="payformany">Apply</button>
<div>
  <hr>
</div>
</div>
<div id="myTable">
@forelse($courses as $course)

<div class="col-md-4">
                        <div data-pages="portlet"  class="panel panel-default" id="portlet-basic">
                          <div class="panel-heading ">
                            <div class="panel-title"><input type="radio" name="{{$course['id']}}_select" course_name="{{$course['subject']}}" course_id="{{$course['id']}}" course_cost="{{$course['cost']}}" class="payradio">Portlet Title
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
											<span class="semi-bold">{{$course['subject']}}({{$course['cost']}})</h3>
                            <p>Basic Portlet tools include a slide toggle button <i class="portlet-icon portlet-icon-collapse"></i>, refresh button <i class="portlet-icon portlet-icon-refresh"></i> and a close button <i class="portlet-icon portlet-icon-close"></i> All these are fully customizable and come with callback functions to integrate with your code. Clicking on the refresh button will simulate an AJAX call.
                            	<br>
                            		@if(App\Http\Controllers\Student\Courses::checkUserAlreadySignedUpForCourse($course['id'])==false)
                            	<a href="#" class="btn btn-success course_radio" link="{{$course['id']}}">apply</a>
                            	@else
                            	<a href="#" class="btn btn-success">already registerd</a>
                            	@endif

                            </p>
                          </div>
                        </div>
                      </div>

 <div class="modal fade slide-up disable-scroll" id="modalSlideUp_{{$course['id']}}" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog ">
              <div class="modal-content-wrapper">
                <div class="modal-content">
                  <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Payment <span class="semi-bold">Information</span></h5>
                    <p class="p-b-10">We need payment information inorder to process your order</p>
                  </div>
                  <div class="modal-body">
                    <form method="POST" role="form" id="payform_{{$course['id']}}" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        <div class="row" style="margin-bottom:40px;">
          <div class="col-md-8 col-md-offset-2">
            <p>
                <div>
                   You are making payment for {{$course['subject']}} <br>

                </div>
            </p>
            <input type="hidden" name="email" value="{{Auth::user()->email}}"> {{-- required --}}
            <input type="hidden" name="orderID" value="345">
            <input type="hidden" name="amount" value="{{$course['cost']*100}}"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="3">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

             <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}


            <p>
                <div class="row">
                      <div class="col-sm-8">
                        <div class="p-t-20 clearfix p-l-10 p-r-10">
                          <div class="pull-left">
                            <p class="bold font-montserrat text-uppercase">TOTAL</p>
                          </div>
                          <div class="pull-right">
                            <p class="bold font-montserrat text-uppercase">${{$course['cost']}}</p>
                          </div>
                        </div>
                      </div>
                    
                    </div>
              <button  linker="{{$course['id']}}" class="pay btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
              <i class="fa fa-plus-circle fa-lg" ></i> Pay Now!
              </button>
            </p>
          </div>
        </div>
</form>

                    
                  </div>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
          </div>
         @empty
         <h1>no free course for your class for now</h1>
         @endforelse
    </div>



             <script src={{asset("client/assets/plugins/jquery/jquery-1.11.1.min.js")}} type="text/javascript"></script>
    <script>
     
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable div").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $('.course_radio').each(function(){
    $(this).click(function(){
      var link=$(this).attr('link');

      $("#modalSlideUp_"+link).modal('show');
    })
  })

  $('.pay').each(function(){
    $(this).click(function(){
      var url="{{route('setCourseSession')}}";
      var token="{{csrf_token()}}";
      var course=$(this).attr('linker');
     var data={_token:token,course:course};
      $.post(url,data,function(info){
        console.log(info);
       $("#payform_"+info).submit();
      })
      return false;
    })
  })

  $("#payformany").click(function(){
//get the things to pay for
  $('.payradio:checked').each(function(){
    
  });
});
});
</script> 
@endsection