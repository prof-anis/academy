@extends('layout.admin_remove')



@section('content')
<div class="col-md-12">
  <div class="col-md-4">
                          <div data-pages="portlet" class="panel panel-default" id="portlet-basic">
                            <div class="panel-heading ">
                              <div class="panel-title">Portlet Title
                              </div>
                            
                            </div>
                            <div class="panel-body">
                              <h3>
                        <span class="semi-bold"><span id="min">{{$time-1}}</span>:<span id="sec">59</span></span></h3>
                             
                            </div>
                          </div>
  </div>
  <div class="progress col-md-4 col-md-offset-2">

         <div class="progress-bar progress-bar-primary" style="width:0%" id="progressTracker"></div>

  </div>
  <div class="col-md-4 cool-md-offset-2" id="progressTrackerBar">0% Done</div>
</div>
<div class="col-md-12">
  @php
  $i=1;
  @endphp
  <form action="{{route('mark@test',['test_id'=>$test_id->id])}}" method="POST">
    {{csrf_field()}}
  @foreach($questions as $question)

  <div class="col-md-8 col-md-offset-2 ques" id="{{$i}}">
                    <div class="panel panel-default">
                      <div class="panel-heading separator">
                        <div class="panel-title"> {{$i}}  {{$question['question']}}
                        </div>
                      </div>
                      <div class="panel-body">
                        <h3>
                  <span class="semi-bold"></h3>
                        <p>
                          
                          @if($question['type']=='german')
                          <p>fill in your answer here</p>
                          <input type="" name="option_{{$question['id']}}" class="form-control input_box" nav_connect = {{$i}} >
                          @endif

                          @if($question['type']=='option')
                    <div>
                      <input nav_connect = {{$i}} type="radio" name="option_{{$question['id']}}" class='radio_button'  id="{{$question['id']}}_a" value="a">
                      <label for="{{$question['id']}}_a">{{$question['a']}}</label>

                      <br>
                      <input nav_connect = {{$i}} type="radio" name="option_{{$question['id']}}" class='radio_button' id="{{$question['id']}}_b" value="b">
                         <label for="{{$question['id']}}_b">{{$question['b']}}</label>
                      <br>
                      <input value="c"  nav_connect = {{$i}} type="radio" name="option_{{$question['id']}}" class='radio_button'  id="{{$question['id']}}_c">
                         <label for="{{$question['id']}}_c">{{$question['c']}}</label>
                      <br>
                      <input value="d" nav_connect = {{$i}}  type="radio" name="option_{{$question['id']}}" class='radio_button'  id="{{$question['id']}}_d">
                         <label for="{{$question['id']}}_d">{{$question['d']}}</label>
                      <br>
                    </div>
                          @endif
                        </p>
                      </div>
                    </div>

                  </div>
                  @php
                  $i++;

                  @endphp
  @endforeach
  <div class="col-md-12">
    <center> 
       <button class="btn btn-primary" id="prev">Previous</button>
      <button class="btn btn-primary" id="next">Next</button>
    </center>

  </div>
  <br>
  <hr>
       <div class="col-md-12">
                        <div data-pages="portlet" class="panel panel-default" id="portlet-basic">
                          <div class="panel-heading ">
                            <div class="panel-title">Assesment Navigator
                            </div>
                            <div class="panel-controls">
                              <ul>
                                <li><a data-toggle="collapse" class="portlet-collapse" href="#"><i class="pg-arrow_maximize"></i></a>
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
                  <span class="semi-bold">With</span> Separator</h3>
                        <p>
                          @php
                          $i=1;
                          @endphp
                          @foreach($questions as $button)
                          <button class="btn buttons" q_connect='{{$i}}' id='bb{{$i}}'>{{$i}}</button>
                          @php
                          $i++;
                          @endphp
                          @endforeach

                         </p>
                      </div>
                        </div>
                      </div>
                  <div class="col-md-12"><button class="pull-right btn btn-success" id="submit">Submit</button></div>

</div>

 <div class="modal fade slide-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog ">
              <div class="modal-content-wrapper">
                <div class="modal-content">
                  <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Alert</h5>
                   
                  </div>
                  <div class="modal-body">
                    <p class="p-b-10">dear {{Auth::user()->email}} you have less than five minutes left for your test</p>
                   
                  </div>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
          </div>
  <script src={{asset("client/assets/plugins/jquery/jquery-1.11.1.min.js")}} type="text/javascript"></script>
    <script src="{{asset('client/assets/js/scripts.js')}}" type="text/javascript"></script>
      <script src="{{asset('client/assets/js/demo.js')}}" type="text/javascript"></script>
  

<script type="text/javascript">

$('.ques').hide();
$('.ques:first').show();



$('#next').click(function(){

  var currId=$('.ques:visible').attr('id');
  if(currId<$('.ques').length){
     var nextId=parseInt(currId)+1;

 $('.ques:visible').hide();

 nextId='#'+nextId;

 $(nextId).show();
  }

  else{
     $('.ques:visible').hide();
    $('.ques:first').show();
  }
  return false;
 
});




$('#prev').click(function(){

  var currId=$('.ques:visible').attr('id');
  if(currId>1){
     var nextId=parseInt(currId)-1;

 $('.ques:visible').hide();

 nextId='#'+nextId;

 $(nextId).show();
  }

  else{
        $('.ques:visible').hide();
    $('.ques:last').show();
  }
  return false;
 
});





function setTimer(){
var min="{{$time-1}}";

var sec=59;
 $('#sec').text(sec);
  $('#min').text(min);
setInterval(function(){
sec--;
if(sec!==0){
  $('#sec').text(sec);
}
if(sec==0 && min!==0){

  min=min-1;
  
   $('#min').text(min);
  sec=59;
  $('#sec').text(sec);


}
//alert user that only five minutes left
if(min==4 && sec==59){
  $("#modalSlideUp").modal('show');
}
if(sec==0 && min==0){
  //submit the form here
  document.getElementById('questions-form').submit();
}

},1000);


}


setTimer();

function fixAssesmentNavigator(){
  $('.radio_button').each(function(){
    $(this).click(function(){
     // alert('kk');

      var nav = $(this).attr('nav_connect');
      var varId='#bb'+nav;
      $(varId).addClass('btn-primary');
    })
  })

  $(".input_box").each(function(){
    $(this).blur(function(){
  
         var nav = $(this).attr('nav_connect');
      var varId='#bb'+nav;
      $(varId).addClass('btn-primary');
      
    
    })
  })
}
fixAssesmentNavigator();


$('.buttons').each(function(){
$(this).click(function(){
var bId='#'+$(this).attr('q_connect');
   $('.ques:visible').hide();
   //alert(bId);
    $(bId).show();
    return false;
});
});


function fixProgressTracker(){
  $('.radio_button').each(function(){
    $(this).click(function(){
      var checked=$('.radio_button:checked').length;
      var total=($('.radio_button').length)/4;
     // alert(total);
      var new_=Math.floor((checked/total)*100)+'%';
      //alert(new_);
      $('#progressTracker').css('width',new_);
      $('#progressTrackerBar').html(new_);
     
    })
  })
}

fixProgressTracker();

$("#flag").click(function(){
 

   var nav =  $(".ques:visible").attr('nav_connect');
      var varId='#bb'+nav;
      $(varId).addClass('btn-danger');
})

//fixing the input boxes to return null by default except overidden


</script>
@endsection

