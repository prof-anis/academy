@extends('layout.superadmin')

@section('content')

@if(session('delete_success') !== null)
<div class="col-md-12">
	{{session('delete_success')}}
</div>
@endif

<div class="col-md-12">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title"> here are all courses you have created
                    </div>
                    <div class="tools">
                      <a class="collapse" href="javascript:;"></a>
                      <a class="config" data-toggle="modal" href="#grid-config"></a>
                      <a class="reload" href="javascript:;"></a>
                      <a class="remove" href="javascript:;"></a>
                    </div>
                  </div>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <div id="condensedTable_wrapper" class="dataTables_wrapper form-inline no-footer"><table class="table table-hover table-condensed dataTable no-footer" id="condensedTable" role="grid">
                        <thead>
                          <tr role="row"><th style="width:30%" class="sorting_asc" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending">Subject Name</th><th style="width: 118px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Key: activate to sort column ascending">Class</th><th style="width: 158px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">Cost</th>
                          <th style="width: 158px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">Action</th>
                      </tr>
                        </thead>
                        <tbody>
                          
                          
                          
                          @forelse($allCourse as $course)
                          
                        <tr role="row" class="odd">
                            <td class="v-align-middle semi-bold sorting_1">{{$course['subject']}}</td>
                            <td class="v-align-middle">{{$course['class']}}</td>
                            <td class="v-align-middle semi-bold">W
                            	{{$course['cost']}}
                            </td>
                               <td class="v-align-middle semi-bold">
                               	<div class="btn-group">
                               	<a href="{{route('admin.showedit',['course'=>$course['id']])}}" class="btn btn-primary">Edit</a>
                               	<a href="{{route('admin.deletecourse',['course'=>$course['id']])}}" class="btn btn-danger del-buttons">Delete</a>
                               </div>
                            </td>

							@empty
							<p>No course have been created thus far</p>

							@endforelse

                          </tr>
                      </tbody>
                      </table></div>
                    </div>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>



     <script src={{asset("client/assets/plugins/jquery/jquery-1.11.1.min.js")}} type="text/javascript"></script>


    <script type="text/javascript">
    	
    	$(document).ready(function(){
    		$('.del-buttons').each(function(){
    			$(this).click(function(){
    				if(confirm("Do you really want to delete this subject, people might have been registered for it, It would surely affect them."))
    				{
    					return true;
    				}
    				else{
    					return false;
    				}
    			})
    		})
    	})
    </script>

@endsection