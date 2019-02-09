@extends('layout.defaultothers')
@section('subheader')
    <link href="{{asset('default/css/blog.css')}}" rel="stylesheet">
  <div class="sub_header bg_2">
        	<div id="intro_txt">
			<h1>Jehozoir <strong>Excellence</strong> in teaching</h1>
            <p>Ex saepe accusata duo, vel ne summo option delenit.</p>
            </div>
		</div> <!--End sub_header -->
@endsection
@section('content')


 	<div class="container_gray_bg">
    	<div class="container margin_60">
    <div class="row">
         
     <div class="col-md-9">
     		
               
                @for($i=0;$i<5;$i++)
				<div class="post">
					<a href="blog_post_right_sidebar.html" ><img src="{{asset('default/img/blog-3.jpg')}}" alt="" class="img-responsive"></a>
					<div class="post_info clearfix">
						<div class="post-left">
							<ul>
								<li><i class="icon-calendar-empty"></i>12/05/2015 <em>by Mark</em></li>
                                <li><i class="icon-inbox-alt"></i><a href="#">Category</a></li>
								<li><i class="icon-tags"></i><a href="#">Works</a>, <a href="#">Personal</a></li>
							</ul>
						</div>
						<div class="post-right"><i class="icon-comment"></i><a href="#">25 </a></div>
					</div>
					<h2>Duis aute irure dolor in reprehenderit</h2>
					<p>
						Ludus albucius adversarium eam eu. Sit eu reque tation aliquip. Quo no dolorum albucius lucilius, hinc eligendi ut sed. Ex nam quot ferri suscipit, mea ne legere alterum repudiandae. Ei pri quaerendum intellegebat, ut vel consequuntur voluptatibus. Et volumus sententiae adversarium duo......
					</p>
                    <p>
						Ludus albucius adversarium eam eu. Sit eu reque tation aliquip. Quo no dolorum albucius lucilius, hinc eligendi ut sed. Ex nam quot ferri suscipit, mea ne legere alterum repudiandae. Ei pri quaerendum intellegebat, ut vel consequuntur voluptatibus. Et volumus sententiae adversarium duo......
					</p>
					<a href="blog_post.html" class="button" >Read more</a>
				</div><!-- end post -->
				@endfor
       
                
              <div class="text-center">
                    <ul class="pagination">
                        <li><a href="#">Prev</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Next</a></li>
                    </ul><!-- end pagination-->
                </div>
     </div><!-- End col-md-8-->   
     
    
     <!-- End aside -->
	
  </div><!-- End row-->         
</div><!-- End container -->
    </div><!--End container_gray_bg -->
    
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