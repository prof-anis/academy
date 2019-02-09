<!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
      <div class="sidebar-overlay-slide from-top" id="appMenu">
        <div class="row">
          <div class="col-xs-6 no-padding">
            <a href="#" class="p-l-40"><img src="assets/img/demo/social_app.svg" alt="socail">
            </a>
          </div>
          <div class="col-xs-6 no-padding">
            <a href="#" class="p-l-10"><img src="assets/img/demo/email_app.svg" alt="socail">
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 m-t-20 no-padding">
            <a href="#" class="p-l-40"><img src="assets/img/demo/calendar_app.svg" alt="socail">
            </a>
          </div>
          <div class="col-xs-6 m-t-20 no-padding">
            <a href="#" class="p-l-10"><img src="assets/img/demo/add_more.svg" alt="socail">
            </a>
          </div>
        </div>
      </div>
      <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
      JEHOZOIR
        <div class="sidebar-header-controls">
         
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->
      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
   



            

           <li>
            <a href="javascript:;"><span class="title">My courses</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i class="pg-tables"></i></span>
            <ul class="sub-menu">
              @foreach(App\Http\Controllers\Teacher\TeacherController::getTeacherCourses() as $course)
              <li class="">
                <a href="{{route('coursedetails@teacher',['id'=>$course['id']])}}">{{$course['subject']}}</a>
                <span class="icon-thumbnail">bt</span>
              </li>
            
              @endforeach
            </ul>
          </li>

          <li>
             <a href="{{route('show@messanger')}}"><span class="title">Messanger</span>
         
            <span class="icon-thumbnail"><i class="pg-tables"></i></span>

          </li>
             
            </ul>
         
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->