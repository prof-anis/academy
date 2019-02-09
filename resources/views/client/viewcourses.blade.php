@extends('layout.admin')



@section('content')
<div class="col-md-12">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">My Courses
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
                          <tr role="row"><th style="width:30%" class="sorting_asc" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending">Cours</th><th style="width: 113px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Key: activate to sort column ascending">Teacher</th><th style="width: 163px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">Actions</th></tr>
                        </thead>
                        <tbody>
                          
                          
                          
                          @forelse($subject as $course)
                          
                        <tr role="row" class="odd">
                            <td class="v-align-middle semi-bold sorting_1">{{App\Http\Controllers\Student\Courses::getCourseById($course['subject'])->subject}}</td>
                            <td class="v-align-middle"> {{App\Http\Controllers\Teacher\TeacherController::getTeacherByEmail($course['teacher'])['email']}}</td>
                            <td class="v-align-middle semi-bold"><span><a href="{{route('course@details',['id'=>$course['subject']])}}">view materials</a></span>
                            </td>
                          </tr>
                          @empty
                          no course is currently available.kindly register for one.
                      @endforelse</tbody>
                      </table></div>
                    </div>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>

@endsection