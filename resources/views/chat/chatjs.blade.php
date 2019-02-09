 <script src={{asset("client/assets/plugins/jquery/jquery-1.11.1.min.js")}} type="text/javascript"></script>


                       <script type="text/javascript">
                       	
                       	$(document).ready(function(){

                       		$('.people').each(function(){
                       			$(this).click(function(){
	                       			var friend_id=$(this).attr('friend_id');
	                       			var url="{{route('get@messanger')}}";
	                       			var token="{{csrf_token()}}";
	                       			var data={_token:token,friend_id:friend_id};

		                       			$.post(url,data,function(info){
		                       			//	alert(info);
		                       				var msg=JSON.parse(info);
		                       				var status=msg[0];
		                       				var message=msg[1];
		                       				var friend=msg[2];

		                       				//update the who chat field
		                       				$('#whoChat').empty();
		                       				$('#whoChat').text(friend.email);
		                       				$('#whoChat').attr('whochatid',friend.id);

		                       				//empty and refill the chat box
		                       				$('#chatbox').empty();
		                       				if(status == 'nothing'){
		                       					$('#chatbox').html("<p>you do not have any pending chat</p>");
		                       				}
		                       				else{
		                       					var user="{{Auth::user()->id}}";
		                       					console.log(message);
		                       					for(var i=0; i<message.length; i++){

		                       						var html='<div class="col-md-12"><div class="alert alert-info bordered col-md-6';
		                       						if(message[i].user_id == user){
		                       							html=html+ "  pull-right  ";
		                       						}
		                       						else{
		                       							html=html+ "  pull-left  ";
		                       						}

		                       						html=html+'col-md-6" role="alert"><p class="pull-left">'+message[i].message+'</p><div class="clearfix"></div></div></div>';
		                       					//	alert(html);
		                       						$("#chatbox").append(html);
		                       					}
		                       				}
		                       			})

		                       			setInterval(function(){
                       			var friend=$('#whoChat').attr('whochatid');
                       			console.log(friend);
                       			
                       			var url="{{route('get@messanger')}}";
                       			var _token="{{csrf_token()}}";
                       			var friend_id=friend;
                       			var data={_token:_token,friend_id:friend_id};
								$.post(url,data,function(info){
									console.log(info)
										var msg=JSON.parse(info);
		                       				var status=msg[0];
		                       				var message=msg[1];
		                       				var friend=msg[2];


		                       				$('#whoChat').empty();
		                       				$('#whoChat').text(friend.email);
		                       				$('#whoChat').attr('whochatid',friend.id);




		                       				$('#chatbox').empty();
		                       				if(status == 'nothing'){
		                       					$('#chatbox').html("<p>you do not have any pending chat</p>");
		                       				}
		                       				else{
		                       					var user="{{Auth::user()->id}}";
		                       					console.log(message);
		                       					for(var i=0; i<message.length; i++){

		                       						var html='<div class="col-md-12"><div class="alert alert-info bordered col-md-6';
		                       						if(message[i].user_id == user){
		                       							html=html+ "  pull-right  ";
		                       						}
		                       						else{
		                       							html=html+ "  pull-left  ";
		                       						}

		                       						html=html+'col-md-6" role="alert"><p class="pull-left">'+message[i].message+'</p><div class="clearfix"></div></div></div>';
		                       					//	alert(html);
		                       						$("#chatbox").append(html);
		                       					}
		                       				}






								})

                       			
                       		},2000);
                       		
		                       			
		                       			
                       			})
                       		})

                       		$('#chatButton').click(function(){
                       			//alert($('#chatMessage').val());
                       			//check if it is empty
                       			if( $('#chatMessage').val() !== ''){
                       				var message=$('#chatMessage').val();
                       				//var receiver_id=$() i am using sessions for my reciever id here
                       				var _token="{{csrf_token()}}";
                       				var data={_token:_token,message:message};
                       				var url="{{route('send@chat')}}";
                       				$.post(url,data,function(info){
                       					var msg=JSON.parse(info);
                       					var status=msg[0];
                       					var message=msg[1];
                       					var html='<div class="col-md-12"><div class="alert alert-info bordered pull-right col-md-6" role="alert"><p class="pull-left">'+message.message+'</p><div class="clearfix"></div></div></div>';
                       					$('#chatbox').append(html);
                       					$("#chatMessage").val(" ");
                       				})
                       			}
                       		})

                       	

                       	})

 $(document).on('keypress',function(e){
 	if(e.which == 13){
 		if( $('#chatMessage').val() !== ''){
                       				var message=$('#chatMessage').val();
                       				//var receiver_id=$() i am using sessions for my reciever id here
                       				var _token="{{csrf_token()}}";
                       				var data={_token:_token,message:message};
                       				var url="{{route('send@chat')}}";
                       				$.post(url,data,function(info){
                       					var msg=JSON.parse(info);
                       					var status=msg[0];
                       					var message=msg[1];
                       					var html='<div class="col-md-12"><div class="alert alert-info bordered pull-right col-md-6" role="alert"><p class="pull-left">'+message.message+'</p><div class="clearfix"></div></div></div>';
                       					$('#chatbox').append(html);
                       					$("#chatMessage").val(" ");
                       				})
                       			}
 	}
 })
                       </script>