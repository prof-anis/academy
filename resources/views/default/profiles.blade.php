@extends('layout.defaultothers')
@section('subheader')

        <div class="sub_header bg_1">
        	<div id="intro_txt">
			<h1><strong>{{$staff->name}}</strong></h1>
            
            </div>
		</div> <!--End sub_header -->
@endsection
@section('content')


 <div id="position">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li>Page active</li>
                </ul>
            </div>
        </div><!-- Position -->
 
 		<div class="container_gray_bg">
        <div class="container margin_60">
          <div class="row">
          <aside class="col-md-3">
            	<div class="profile">
		<p class="text-center"><img  width="150"  height="150"  src="{{$staff['image']}}" alt="Teacher" class="img-circle styled_2"></p>
        		  <ul class="social_teacher">
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class=" icon-google"></i></a></li>
                </ul>   
                 <ul>
                     <li>Name <strong class="pull-right">{{$staff->name}}</strong> </li>
                     <li>Email <strong class="pull-right">{{$staff->email}}</strong></li>
                   
                </ul>
              
			</div><!-- End box-sidebar -->
            </aside>
          	<div class="col-md-9">
            	<div class="box_style_1">
                		<div class="indent_title_in">
                    <i class="pe-7s-user"></i>
				<h3>Profile</h3>
			
			</div>
            	<div class="wrapper_indent">
                        <p>{{$staff->about}}</p>
						<div class="row">
                        	<div class="col-md-6">
                            	<ul class="list_3">
                                    <li><strong>September 2009 - Bachelor Degree in Economics</strong><p>University of Cambrige - United Kingdom</p></li>
                                    <li><strong>December 2012 - Master course in Economics</strong><p>University of Cambrige - United Kingdom</p></li>
                                    <li><strong>October 2013 - Master's Degree in Statistic</strong><p>University of Oxford - United Kingdom</p></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                            	<ul class="list_3">
                                    <li><strong>September 2009 - Bachelor Degree in Economics</strong><p>University of Cambrige - United Kingdom</p></li>
                                    <li><strong>December 2012 - Master course in Economics</strong><p>University of Cambrige - United Kingdom</p></li>
                                </ul>
                            </div>
                        </div><!-- End row--> 
                </div><!--wrapper_indent -->
                <hr class="styled_2">
                	<div class="indent_title_in">
                    <i class="pe-7s-display1"></i>
				
            </div>
            
        </div><!--End row -->
        </div><!--End container -->
        </div><!--End bg_gray_container -->
        

		<div class=" container_gray_line" id="newsletter_container">
        <div class="container margin_60">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h3>Subscribe to our Newsletter for latest news.</h3>
                    <div id="message-newsletter"></div>
                    <form method="post" action="assets/newsletter.php" name="newsletter" id="newsletter" class="form-inline">
                        <input name="email_newsletter" id="email_newsletter" type="email" value="" placeholder="Your Email" class="form-control">
                        <button id="submit-newsletter" class="button"> Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        </div><!-- End newsletter_container -->

@endsection