@extends('layout.admin')



@section('content')

<div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">Previously written test
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
                          <tr role="row"><th style="width:30%" class="sorting_asc" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending">Subject</th><th style="width: 113px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Key: activate to sort column ascending">Topic</th><th style="width: 163px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">Mode</th>
                          
                          	<th style="width: 163px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">Action</th></tr>
                        </thead>
                        <tbody>
                          
                          
                          
                          
                          @forelse($pastTest as $test)
                          @if($test['id']%2 == 1)
                        <tr role="row" class="odd">
                            <td class="v-align-middle semi-bold sorting_1">{{App\Http\Controllers\Student\Courses::getCourseById($test['subject'])->subject}}</td>
                            <td class="v-align-middle">{{$test['topic']}}</td>
                            <td class="v-align-middle semi-bold">
                              @if($test['is_retake'] == 1)
                              You retook a test 
                              @else
                              original test
                              @endif
                            </td>
                            
                             <td class="v-align-middle semi-bold">
                            
                             		<a href="{{route('review@test',['id'=>$test['id']])}}" class="btn btn-primary">Review</a>
                            </td>  @if($test['is_retake'] != 1)
                              <a href="{{route('retake@test',['id'=>$test['id']])}}" class="btn btn-success">Retake</a>
                              @endif
                           
                          </tr>
                           @else
                           <tr role="row" class="even">
                           <td class="v-align-middle semi-bold sorting_1">{{App\Http\Controllers\Student\Courses::getCourseById($test['subject'])->subject}}</td>
                            <td class="v-align-middle">{{$test['topic']}}</td>
                            <td class="v-align-middle semi-bold">
                              @if($test['is_retake'] == 1)
                              You retook a test 
                              @else
                              original test
                              @endif
                            </td>
                            
                             <td class="v-align-middle semi-bold">
                                <a href="{{route('review@test',['id'=>$test['id']])}}" class="btn btn-primary">Review</a>

                                 @if($test['is_retake'] != 1)
                              <a href="{{route('retake@test',['id'=>$test['id']])}}" class="btn btn-success">Retake</a>
                              @endif
                            </td>
                          </tr>
                          @endif
                          @empty
                          <p>no previous test available</p>
                          @endforelse
                      </tbody>
                      </table></div>
                    </div>
                  </div>
                </div>

@endsection