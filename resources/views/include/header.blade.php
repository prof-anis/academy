<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <div id="logo">
                    <a href="index.html"><img src="{{asset('default/img/logo.png')}}" width="125" height="40" alt="Atena" data-retina="true"></a>
                </div>
            </div>
            <nav class="col-md-9 col-sm-9 col-xs-9">
            <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
            <div class="main-menu">
                <div id="header_menu">
                    <img src="{{asset('default/img/logo_mobile.png')}}" width="125" height="40" alt="Atena" data-retina="true">
                </div>
                <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
                <ul>
                    <li class="submenu">
                    <a href="{{route('defaulthome')}}" class="show-submenu">Home </a>
                   
                    </li>
                   
                    <li class="submenu">
                    <a href="javascript:void(0);" class="show-submenu">About <i class="icon-down-open-mini"></i></a>
                    <ul>
                        <li><a href="{{route('about')}}">About us</a></li>
                        
                        <li><a href="{{route('staffs')}}">Staff</a></li>
                       
                    </ul>
                    </li>
                      
                    <li><a href="{{route('tour')}}">Tour</a></li>
                     <li><a href="#" data-toggle="modal" data-target="#register">Register</a></li>
                         <li><a href="{{route('register')}}" >Apply</a></li>
                     @if(Auth::check())
                     @else
                       <li><a href="{{route('login')}}">Login</a></li>
                       @endif
                       </ul>
            </div>
           

            <!-- End main-menu -->
            </nav>
        </div>
    </div><!-- container -->
    </header><!-- End Header -->




