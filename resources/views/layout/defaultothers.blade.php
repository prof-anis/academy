<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>



@include('include.head');




<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

<div id="preloader">
  <div class="pulse"></div>
</div><!-- Pulse Preloader -->

    <!-- Header================================================== -->


   @include("include.header");





@yield('subheader');
@yield('content')


@include('include.footer');


       


@include('include.modal');




@include('include.java');

</body>
</html>ss