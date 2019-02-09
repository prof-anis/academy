@extends('layout.student')


@section('pageheader')

<div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
	                                <h2 class="page-header-title">Blank Page</h2>
                                    <div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="db-all.html"><i class="ti ti-home"></i></a></li>
                                            <li class="breadcrumb-item active">Blank</li>
                                        </ul>
                                    </div>	                            
                                </div>
                            </div>
                        </div>


@endsection
@section('content')

<div class="col-xl-12">
                                <!-- Default -->
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Default</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th>Date Published</th>
                                                        <th>Teacher</th>
                                                        <th>Number of questions</th>
                                                        <th><span style="width:100px;">Status</span></th>
                                                        <th>Action</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($tests as $test)
                                                    <tr>
                                                        <td><span class="text-primary">{{App\Http\Controllers\Student\Courses::getCourse($test['subject'])['subject']}}</span></td>
                                                        <td>{{$test['created_at']}}</td>
                                                        <td>{{App\Http\Controllers\Teacher\TeacherController::getTeacher($test['teachers_id'])->email}}</td>
                                                        <td></td>
                                                        <td><span style="width:100px;"><span class="badge-text badge-text-small info">@if($test['status']==0)Not done @endif @if($test['status']==1)Live @endif</span></span></td>
                                                        
                                                        <td class="td-actions">
                                                            <a href="{{route('showstart@test',['test_id'=>$test['id']])}}"><i class="la la-edit edit">Attempt</i></a>
                                                                </td>
                                                    </tr>
                                                   @empty
                                                   @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Default -->
                             
                                
                            </div>



@endsection