@extends('layout.superadmin')

@section('content')


<div class="panel-body">
                <div class="table-responsive">
                  <div id="basicTable_wrapper" class="dataTables_wrapper form-inline no-footer"><table class="table table-hover dataTable no-footer" id="basicTable" role="grid">
                    <thead>
                      <tr role="row"><th style="width:1%" class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                          
                          
                        ">
                          <button class="btn"><i class="pg-trash"></i>
                          </button>
                        </th><th style="width: 166px;" class="sorting_desc" tabindex="0" aria-controls="basicTable" rowspan="1" colspan="1" aria-sort="descending" aria-label="Title: activate to sort column ascending">Name</th><th style="width: 168px;" class="sorting" tabindex="0" aria-controls="basicTable" rowspan="1" colspan="1" aria-label="Places: activate to sort column ascending">Email</th><th style="width: 257px;" class="sorting" tabindex="0" aria-controls="basicTable" rowspan="1" colspan="1" aria-label="Activities: activate to sort column ascending">About</th><th style="width: 117px;" class="sorting" tabindex="0" aria-controls="basicTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">CV</th><th style="width: 118px;" class="sorting" tabindex="0" aria-controls="basicTable" rowspan="1" colspan="1" aria-label="Last Update: activate to sort column ascending">Action</th></tr>
                    </thead>
                    <tbody>
                      
                      
                      
                      
                      
                      @forelse($requests as $request)
                    <tr role="row" class="odd">
                        <td class="v-align-middle">
                          <div class="checkbox ">
                            <input value="3" id="checkbox4" type="checkbox">
                            <label for="checkbox4"></label>
                          </div>
                        </td>
                        <td class="v-align-middle sorting_1">
                          <p>{{$request['name']}}</p>
                        </td>
                        <td class="v-align-middle">
                          <p>{{$request['email']}}</p>
                        </td>
                        <td class="v-align-middle">
                          <p>{{$request['about']}}</p>
                        </td>
                        <td class="v-align-middle">
                          <p>{{$request['cv']}}</p>
                        </td>
                        <td class="v-align-middle">
                          <p>

                          	<div class="btn-group">
                          		<a href="{{route('admin.createteacher',['email'=>$request['id']])}}" class="btn btn-primary"><span class="fa fa-check"></span></a>
                          		<a href="{{route('admin.deleterequest',['id'=>$request['id']])}}" class="btn btn-danger"><span class="fa fa-trash"></span></a>


                          	</div>

                          </p>
                        </td>
                      </tr>
                      @empty
                      <p>no pending request yet!</p>
                      @endforelse


                  </tbody>
                  </table></div>
                </div>
              </div>

@endsection