

  <section class="header-video">
  <div id="hero_video">
  <div id="intro_txt" >
        <h1 class="animated fadeInDown">Atena <strong>Excellence</strong> in teaching</h1>
        <p class="animated fadeInDown">College / University / Campus</p>
        <a href="tour.html" class="animated fadeInUp button_intro">Take a tour</a> 
        <a href="#" class="animated fadeInUp button_intro outline hidden-sm hidden-xs">View courses</a>
        <a  href="https://vimeo.com/20370747" class="video_pop animated fadeInUp button_intro outline">Play video</a>
   </div>    
 </div>
    <img src="{{asset('default/img/video_fix.png')}}" alt="" class="header-video--media" data-video-src="{{asset('default/video/intro')}}"  data-teaser-source="{{asset('default/video/intro')}}" data-provider="Vimeo" data-video-width="1920" data-video-height="960">

    <video autoplay="true" loop="loop" muted="" id="teaser-video" class="teaser-video"><source src="{{asset('default/video/intro')}}" type="video/mp4"><source src="video/intro.ogv" type="video/ogg"></video>
</section><!-- End Header video -->



<script src="{{asset('default/js/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('default/js/common_scripts_min.js')}}"></script>
<script src="{{asset('default/js/functions.js')}}"></script>

<!-- Newsletter validate -->
<script src="{{asset('default/assets/validate.js')}}"></script>
<script src="{{asset('default/js/tabs.js')}}"></script>
    <script>
      new CBPFWTabs( document.getElementById( 'tabs' ) );
    </script>
        
  <script src="{{asset('default/js/video_header.js')}}"></script>
<script>
$(document).ready(function() {
  'use strict';
   HeaderVideo.init({
      container: $('.header-video'),
      header: $('.header-video--media'),
      videoTrigger: $("#video-trigger"),
      autoPlayVideo: false
    });    

});
</script>