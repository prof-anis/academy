
	
 <!-- Login modal -->   
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<form action="#" class="popup-form" id="myLogin">
					<input type="text" class="form-control form-white" placeholder="Username">
					<input type="text" class="form-control form-white" placeholder="Password">
					<div class="checkbox-holder text-left">
						<div class="checkbox">
							<input type="checkbox" value="accept_1" id="check_1" name="check_1" />
							<label for="check_1"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
						</div>
					</div>
					<button type="submit" class="btn btn-submit">Submit</button>
				</form>
			</div>
		</div>
	</div>  
    
<!-- Register modal -->   
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<p id="sucessMessage" style="color:green"></p>
				<form action="#" class="popup-form" id="myRegister">
					  <input type="email" class="form-control form-white" placeholder="Email" id='email' name='email'>
                    <input type="text" class="form-control form-white" placeholder="Password" id='pass' name='pass'>

                    <select id="class">
                    	<option value='ss1'>SS1</option>
                    	<option value='ss2'>SS2</option>
                    	<option value='ss3'>SS3</option>
                    </select>
					{{csrf_field()}}
					<div class="checkbox-holder text-left">
						<div class="checkbox">
							<input type="checkbox" value="accept_2" id="check_2" name="check_2" />
							<label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
						</div>
					</div>
					<button type="submit" class="btn btn-submit" id='registerbutton'>Register</button>
				</form>
			</div>
		</div>
	</div>
    
  <!-- Search modal -->   
 <div id="search">
    <button type="button" class="close">×</button>
    <form>
        <input type="search" value="" placeholder="type keyword(s) here" >
        <button type="submit" class="button">Search</button>
    </form>
			</div>

<script src="{{asset('default/js/jquery-1.11.2.min.js')}}"></script>
<script>

			alert('rr');
			$(document).ready(function(){
				//alert('o');
				alert('iugyftdrestdhygjk');
			$('#registerbutton').click(function(e){
				e.preventDefault();
				//return false;
				alert('hgjk');
	

			 var email=$('#email').val().trim();
			 var pass=$('#pass').val().trim();
			 var token='{{csrf_token()}}';
			 var user_class=$('#class').val().trim();

			 if(email=='' || pass==''){
			 	alert('some input are empty');
			 	
			 	return false;
			 }
			 else{
			 	  var url="{{route('registerstudent')}}";
			 	  var data={email:email,pass:pass,_token:token,user_class:user_class};
			 	  $.post(url,data,function(info){
			 	  	console.log(info);
			 	  	if(info=='done'){
			 	  		var responce="a validation link as been sent to your mail , kindly click on the link to finish your registration. Thank you!"
			 	  	   $('#sucessMessage').html(responce);
			 	  	}
			 	  })


			 }

			})





			});



</script>
