@extends('layout.defaultothers')
@section('subheader')
  <div class="sub_header bg_2">
        	<div id="intro_txt">
			<h1>Jehozoir <strong>Excellence</strong> in teaching</h1>
            <p>Ex saepe accusata duo, vel ne summo option delenit.</p>
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
          <div class="main_title">
            <h2>ATENA Teachers ...</h2>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            </div>
       <div class="row staff">

       	@foreach($staffs as $staff)
			<div class="col-md-4">
            	<div class="box_style_1">
                	<p><img    width="150"  height="150"  src="{{$staff['image']}}" alt="" class="img-circle styled"></p>
                                <h4>{{$staff['name']}}</h4>
             					<p> 
                                    {{$staff['about']}}

                                </p>
                                  
                            <hr>
                             <a href="{{route('profiles',['id'=>$staff['id']])}}" class="button_outline">Profile</a>           
                </div>
            </div>
            @endforeach
            <div class="col-md-12 col-md-offset-1">
                <center>
            {{$staffs->links()}}
        </center>
        </div>
            
        </div><!--End container -->
        </div><!--End bg_gray_container -->
       
        

		<div class=" container_gray_line" id="newsletter_container">
        <div class="container margin_60">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h3>Subscribe to our Newsletter for latest news.</h3>
                    <div id="message-newsletter"></div>
                    <form method="post" action="assets/default/newsletter.php" name="newsletter" id="newsletter" class="form-inline">
                        <input name="email_newsletter" id="email_newsletter" type="email" value="" placeholder="Your Email" class="form-control">
                        <button id="submit-newsletter" class="button"> Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        </div><!-- End newsletter_container -->


@endsection