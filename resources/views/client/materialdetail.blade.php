@extends('layout.admin')



@section('content')

<h2>{{ucfirst($type)}} Resources </h2>
@forelse($getMaterials as $material)
<div class="col-md-4">
                    <div class="panel panel-default">
                      <div class="panel-heading separator">
                        <div class="panel-title">Portlet Three
                        </div>
                      </div>
                      <div class="panel-body">
                        <h3>
                                    <span class="semi-bold">{{$material['title']}}</h3>
                        <p>
                            <span class="fa-file-pdf-o"></span>
                            <br>
                            @if($material['type']=="pdf")
                            <a class="btn btn-primary" href="{{$material['location']}}">Download</a>
                            @endif
                              @if($material['type']=="video")

    
                        <video width="320" height="240" controls>
                          <source src="{{'http://'.$material['location']}}" type="video/mp4">
                          
                        Your browser does not support the video tag.
                        </video>

                            <a class="btn btn-primary" target="video_i_frame">Play</a>
                            @endif
                            @if($material['type']=="audio")
                               <audio controls>
                                  <source src="{{$material['location']}}" type="audio/mpeg">
                                  <source src="horse.mp3" type="audio/mpeg">
                                Your browser does not support the audio element.
                                </audio>
                            @endif

                        </p>
                      </div>
                    </div>
                  </div>

                  @empty
                  <p>no material available for this category</p>
@endforelse
<p class="col-md-12">showing {{$getMaterials->count()}} of {{$getMaterials->total()}}</p>
{{$getMaterials->links()}}

@endsection