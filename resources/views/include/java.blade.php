    
<!-- Common scripts -->
<script src="{{asset('default/js/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('default/js/common_scripts_min.js')}}"></script>
<script src="{{asset('default/js/functions.js')}}"></script>
<script src="{{asset('default/assets/validate.js')}}"></script>
<!-- Specific scripts -->
<script src="{{asset('default/layerslider/js/greensock.js')}}"></script>
 <script src="{{asset('default/layerslider/js/layerslider.transitions.js')}}"></script>
<script src="{{asset('default/layerslider/js/layerslider.kreaturamedia.jquery.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
		'use strict';
        $('#layerslider').layerSlider({
            autoStart: true,
			responsive: true,
			responsiveUnder: 1280,
			layersContainer: 1170,
            skinsPath: 'layerslider/skins/'
            // Please make sure that you didn't forget to add a comma to the line endings
            // except the last line!
        });
    });
</script>
<script src="{{asset('default/js/tabs.js')}}"></script>
<script>new CBPFWTabs( document.getElementById( 'tabs' ) );</script>