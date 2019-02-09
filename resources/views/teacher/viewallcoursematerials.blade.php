@extends('layout.teacher')
@section('content')


<div class="col-md-12">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">Course Materials
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
                          <tr role="row"><th style="width:30%" class="sorting_asc" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending">Title</th><th style="width: 113px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Key: activate to sort column ascending">Type</th><th style="width: 163px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">Class</th>
                          <th style="width: 163px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">Code</th>
                           <th style="width: 163px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">Action</th>
                      </tr>
                        </thead>
                        <tbody>
                          
                          
                          @forelse($materials as $material)
                          
                          
                        <tr role="row" class="odd">
                            <td class="v-align-middle semi-bold sorting_1">{{$material['title']}}</td>
                            <td class="v-align-middle">{{$material['type']}}</td>
                            <td class="v-align-middle semi-bold">
                            	{{$material['class']}}
                            </td>
                             <td class="v-align-middle semi-bold">
                            	{{$material['id']}}
                            </td>
                             <td class="v-align-middle semi-bold">
                            	<div class="btn-group">
                            		<a href="{{$material['location']}}" class="btn btn-primary">Download</a>
                            	</div>
                            </td>
                          </tr>

                          @empty
                          No active materials currently
                          @endforelse

                      </tbody>
                      </table></div>
                    </div>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>

@endsection