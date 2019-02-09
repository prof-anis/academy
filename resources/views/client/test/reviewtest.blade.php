@extends('layout.admin_remove')



@section('content')

<div class="col-md-12">
  @php
  $i=1;
  @endphp
  <form  method="POST">
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

                        <p>the correct answer is {{$question['ans']}} </p>
                      <p>you chose @if($ans[$question['id']]==null) nothing @else  {{$ans[$question['id']]}} @endif</p>
                      <p>Hence you are @if($ans[$question['id']]==$question['ans']) correct @else wrong @endif</p>
                          <input type="" name="option_{{$question['id']}}" class="form-control input_box" nav_connect = {{$i}} disabled="" @if($ans[$question['id']]== null) value="you didnt type in anything" @else value="$ans[$question['id']]" @endif  >
                          <p>@if($ans[$question['id']]==$question['ans'])you got it right@else you got it wrong @endif</p>
                          @endif

                          @if($question['type']=='option')
                    <div>
                      <input nav_connect = {{$i}} type="radio" name="option_{{$question['id']}}" class='radio_button'  id="{{$question['id']}}_a" value="a" @if($ans[$question['id']]=='a') checked @endif >
                      <label for="{{$question['id']}}_a">{{$question['a']}}</label>

                      <br>
                      <input nav_connect = {{$i}} type="radio" name="option_{{$question['id']}}" class='radio_button' id="{{$question['id']}}_b" value="b" @if($ans[$question['id']]=='b') checked @endif >
                         <label for="{{$question['id']}}_b">{{$question['b']}}</label>
                      <br>
                      <input value="c"  nav_connect = {{$i}} type="radio" name="option_{{$question['id']}}" class='radio_button'  id="{{$question['id']}}_c" @if($ans[$question['id']]=='c') checked @endif  >
                         <label for="{{$question['id']}}_c">{{$question['c']}}</label>
                      <br>
                      <input value="d" nav_connect = {{$i}}  type="radio" name="option_{{$question['id']}}" class='radio_button'  id="{{$question['id']}}_d"  @if($ans[$question['id']]=='d') checked @endif >
                         <label for="{{$question['id']}}_d">{{$question['d']}}</label>
                      <br>
                      <p>the correct answer is {{$question['ans']}} </p>
                      <p>you chose @if($ans[$question['id']]==null) nothing @else  {{$ans[$question['id']]}} @endif</p>
                      <p>Hence you are @if($ans[$question['id']]==$question['ans']) correct @else wrong @endif</p>
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









$('.buttons').each(function(){
$(this).click(function(){
var bId='#'+$(this).attr('q_connect');
   $('.ques:visible').hide();
   //alert(bId);
    $(bId).show();
    return false;
});
});





//fixing the input boxes to return null by default except overidden


</script>
@endsection

