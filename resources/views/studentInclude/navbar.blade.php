  <!-- Begin Side Navbar -->
                    <nav class="side-navbar box-scroll sidebar-scroll">
                        <!-- Begin Main Navigation -->
                        <ul class="list-unstyled">
                            <li><a href="javascript:void(0);"><i class="la la-at"></i><span>Payment Details</span></a></li>
                            
                            <li><a href="#dropdown" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>Test Details</span></a>
                               
                                <ul id="dropdown" class="collapse list-unstyled pt-0">
                                    <li><a href="javascript:void(0);">Past records</a></li>
                                    <li><a href="{{route('available@test')}}">New Test</a></li>
                                    
                                </ul>
                           
                            </li>
                        </ul>
                       
                        <ul class="list-unstyled">
                            <li class="active"><a href="#dropdown-db" aria-expanded="true" data-toggle="collapse"><i class="la la-columns"></i><span>My Courses</span></a>
                                <ul id="dropdown-db" class="collapse list-unstyled show pt-0">
                                   @forelse(App\Http\Controllers\Student\Courses::getCourses() as $key=>$course)
                                    <li><a class="" href="{{route('course@details',['id'=>$key])}}">{{$course}}</a></li>
                                  
                                    @empty
                                    <li><a href="">No course active course currently</a></li>
                                    @endforelse
                                </ul>
                            </li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="db-all.html"><i class="la la-angle-left"></i><span>Back To Elisyam</span></a></li>
                        </ul>
                        <!-- End Main Navigation -->
                    </nav>