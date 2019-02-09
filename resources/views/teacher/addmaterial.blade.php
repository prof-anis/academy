@extends('layout.teacher')
@section('content')
<div class="col-md-12">
	@if(session('sucess') !== null)
	{{session('sucess')}}
	@endif
</div>
<form method="POST" action="{{route('fixaddmaterials',['course'=>$course])}}"  enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">


                          	


                            <div class="panel-title">Select the material to be added.
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
                            

                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>TITLE</label>
                            <input type="text" class="form-control" required="" name='title'>
                          </div>
                        </div>


                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Topics</label>
                            <input type="text" class="form-control" required="" name='topics'>
                          </div>
                        </div>


                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Class</label>
                            <input type="text" class="form-control" required="" name='class'>
                          </div>
                        </div>





                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>File Type</label>
                           <select class="form-control" name="type">
                           	<option  value='pdf'>PDF</option>
                           	<option value="video">VIDEO</option>
                           	<option value="audio">AUDIO</option>
                           </select>
                          </div>
                        </div>


                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>File Link</label>
                            <input type="text" class="form-control" required="" name="file">
                          </div>
                        </div>




                        <div class="col-sm-12">
                          <center>
                            <input type="submit" class="btn btn-primary" required="" value="ADD MATERIAL" >
                         </center>
                         </div>







                            </p>
                          </div>
                        </div>
                      </div>
                  </form>
	}

@endsection