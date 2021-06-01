<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/fr.min.js" integrity="sha512-RAt2+PIRwJiyjWpzvvhKAG2LEdPpQhTgWfbEkFDCo8wC4rFYh5GQzJBVIFDswwaEDEYX16GEE/4fpeDNr7OIZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>		<style>
        body,html{
			height: 100%;
			margin: 0;
			background: #7F7FD5;
	       background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
	        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
		}

		.chat{
			margin-top: auto;
			margin-bottom: auto;
		}
		.card{
			height: 500px;
			border-radius: 15px !important;
			background-color: rgba(0,0,0,0.4) !important;
		}
		.contacts_body{
			padding:  0.75rem 0 !important;
			overflow-y: auto;
			white-space: nowrap;
		}
		.msg_card_body{
			overflow-y: auto;
		}
		.card-header{
			border-radius: 15px 15px 0 0 !important;
			border-bottom: 0 !important;
            background-color: rgb(0 0 0 / 25%);
		}
	 .card-footer{
		border-radius: 0 0 15px 15px !important;
			border-top: 0 !important;
	}
		.container{
			align-content: center;
		}
		.search{
			border-radius: 15px 0 0 15px !important;
			background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color:white !important;
		}
		.search:focus{
		     box-shadow:none !important;
           outline:0px !important;
		}
		.type_msg{
			background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color:white !important;
			height: 60px !important;
			overflow-y: auto;
		}
			.type_msg:focus{
		     box-shadow:none !important;
           outline:0px !important;
		}
		.attach_btn{
	border-radius: 15px 0 0 15px !important;
	background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color: white !important;
			cursor: pointer;
		}
		.send_btn{
	border-radius: 0 15px 15px 0 !important;
	background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color: white !important;
			cursor: pointer;
		}
		.search_btn{
			border-radius: 0 15px 15px 0 !important;
			background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color: white !important;
			cursor: pointer;
		}
		.contacts{
			list-style: none;
			padding: 0;
		}
		.contacts li{
			width: 100% !important;
			padding: 5px 10px;
			margin-bottom: 15px !important;
		}
	.active{
			background-color: rgba(0,0,0,0.3);
	}
		.user_img{
			height: 70px;
			width: 70px;
			border:1.5px solid #f5f6fa;
		
		}
		.user_img_msg{
			height: 40px;
			width: 40px;
			border:1.5px solid #f5f6fa;
		
		}
	.img_cont{
			position: relative;
			height: 70px;
			width: 70px;
	}
	.img_cont_msg{
			height: 40px;
			width: 40px;
	}
	.online_icon{
		position: absolute;
		height: 15px;
		width:15px;
		background-color: #4cd137;
		border-radius: 50%;
		bottom: 0.2em;
		right: 0.4em;
		border:1.5px solid white;
	}
	.offline{
		background-color: #c23616 !important;
	}
	.user_info{
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 15px;
	}
	.user_info span{
		font-size: 20px;
		color: white;
	}
	.user_info p{
	font-size: 10px;
	color: rgba(255,255,255,0.6);
	}
	.error_warning {
  opacity: 0;
  animation: blinking 1s linear infinite;
}

@keyframes blinking {
  from,
  49.9% {
    opacity: 0;
  }
  50%,
  to {
    opacity: 1;
  }
}
	.video_cam{
		margin-left: 50px;
		margin-top: 5px;
	}
	.video_cam span{
		color: white;
		font-size: 20px;
		cursor: pointer;
		margin-right: 20px;
	}
	.msg_cotainer{
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 10px;
		border-radius: 25px;
		background-color: #82ccdd;
		padding: 10px;
		position: relative;
        min-width: 15%;

	}
	.msg_cotainer_send{
		margin-top: auto;
		margin-bottom: auto;
		margin-right: 10px;
		border-radius: 25px;
		background-color: #78e08f;
		padding: 10px;
		position: relative;
		
		min-width: 15%;
	}
	.msg_time{
		position: absolute;
		left: 0;
		color: rgba(255,255,255,0.5);
		font-size: 10px;
		left: 15px;
    	bottom: -18px;
	}
	.timer{
		font-size:10px;
		font-weight: 800;
	}
	.msg_time_send{
		position: absolute;
		right:0;
		bottom: -18px;
		color: rgba(255,255,255,0.5);
		font-size: 10px;
		right: 15px;
	}
	.msg_head{
		position: relative;
	}
	#action_menu_btn{
		position: absolute;
		right: 10px;
		top: 10px;
		color: white;
		cursor: pointer;
		font-size: 20px;
	}
	.msg_orriginal_time{
		display: none;
	}
	.error_warning{
		width: 100%;
    text-align: center;
    color: #e96767;
    margin-bottom: 5px;
	}
	.action_menu{
		z-index: 1;
		position: absolute;
		padding: 15px 0;
		background-color: rgba(0,0,0,0.5);
		color: white;
		border-radius: 15px;
		top: 30px;
		right: 15px;
		display: none;
	}
	.action_menu ul{
		list-style: none;
		padding: 0;
	margin: 0;
	}
	.action_menu ul li{
		width: 100%;
		padding: 10px 15px;
		margin-bottom: 5px;
	}
	.action_menu ul li i{
		padding-right: 10px;
	
	}
	.action_menu ul li:hover{
		cursor: pointer;
		background-color: rgba(0,0,0,0.2);
	}
	@media(max-width: 576px){
	.contacts_card{
		margin-bottom: 15px !important;
	}
	}
        </style>
        <script>
			
            	$(document).ready(function(){
					moment.locale('fr'); 

var myVar = setInterval(refresh ,3000);
function refresh() {
  var d = new Date();
  var datas={       
			 _token: "{{ csrf_token() }}",
			 conversation_id: 52, 
			 sender:{{$user_id}}
			 };
  fetch('/refresh', {
  method: 'post',
  headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json'
  },
  body: JSON.stringify(datas)
}).then(res =>{
	res.json().then(response =>{
		console.log(response.messages)
		response.messages.forEach(message => {
			var date = new Date(message.created_at);
			date=moment(date).format('LTS');
			$("#msg_card_body").append(
            '<div class="d-flex justify-content-start mb-4"><div class="img_cont_msg">'+
        '<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"'+
         'class="rounded-circle user_img_msg"></div>'+
		'<div class="msg_cotainer">'+message.body+
			'<span class="msg_time">'+date+'</span>'+
			'<span class="msg_orriginal_time">'+message.created_at+'</span>'+
        '</div></div>');
        $("#msg_card_body").animate({ scrollTop: $('#msg_card_body').prop("scrollHeight")}, 1000); 

			
		});
	});
	//console.log(res.json()
	

} )
  //.then(res => console.log(res));
}

$('#action_menu_btn').click(function(){
	$('.action_menu').toggle();
});
$("#msg_area").on('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
		sendMessage();
    }
});
$('#send_btn').click(function() {
	sendMessage();
} )
	});
function sendMessage() {
        //messages.push(message);
        var message=$('#msg_area').val();
		
        $('#msg_area').val("");
        
		var date_now = new Date();
			date=moment(date_now).format('LTS');
        $("#msg_card_body").append(
            '<div class="d-flex justify-content-end mb-4">'+
								'<div class="msg_cotainer_send">'+
									message+
									'<span class="msg_time_send">'+date+'</span>'+
									'<span class="msg_orriginal_time">'+date_now+'</span>'+
								'</div>'+
								'<div class="img_cont_msg">'+
                                '<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">'+
								'</div>'+
							'</div>');
        $("#msg_card_body").animate({ scrollTop: $('#msg_card_body').prop("scrollHeight")}, 700); 

        var datas={       
			 _token: "{{ csrf_token() }}",
			 conversation_id: 52, 
			 message:message
			 };

        fetch('/sendMessage', {
  method: 'post',
  headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json'
  },
  body: JSON.stringify(datas)
}).then(res =>{
	res.json().then(response =>{
		console.log(response)
		if(response.status!=1000){
			$("#message_error").text(response.message)
			setTimeout(function(){ 
				$("#message_error").text('');
				 }, 10000);
				
			
		}
  
       
    })
})
}

        </script>
	</head>
	<body>
		<div class="container-fluid h-100">
			<div style="text-align: center; width:100%; margin-top: 20px;">
				<a class="btn btn-primary" href="{{ route('dashboard') }}"> Accueil</a>
			</div>  
			

			<div class="row justify-content-center h-100">
				
			@can('role-create')
				<div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
				
					<div class="card-header">
						<div class="input-group">
							<input type="text" placeholder="Search..." name="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>
					
					<div class="card-body contacts_body">
						<ul class="contacts">
						<li class="active">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span>Utilisateur 1</span>
									<p>temps d'attente:<span class="timer">10 </span>s </p>
								</div>
							</div>
						</li>
						<li>
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="https://2.bp.blogspot.com/-8ytYF7cfPkQ/WkPe1-rtrcI/AAAAAAAAGqU/FGfTDVgkcIwmOTtjLka51vineFBExJuSACLcBGAs/s320/31.jpg" class="rounded-circle user_img">
									<span class="online_icon offline"></span>
								</div>
								<div class="user_info">
									<span>Utilisateur 2</span>
									<p>temps d'attente:<span class="timer">25 </span>s </p>
								</div>
							</div>
						</li>
						<li>
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="https://i.pinimg.com/originals/ac/b9/90/acb990190ca1ddbb9b20db303375bb58.jpg" class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span>Utilisateur 3</span>
									<p>temps d'attente:<span class="timer">30 </span>s </p>
								</div>
							</div>
						</li>
						
						<li>
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="https://static.turbosquid.com/Preview/001214/650/2V/boy-cartoon-3D-model_D.jpg" class="rounded-circle user_img">
									<span class="online_icon offline"></span>
								</div>
								<div class="user_info">
									<span>Utilisateur 4</span>
									<p>temps d'attente:<span class="timer">40 </span>s </p>
								</div>
							</div>
						</li>
						</ul>
					</div>
					
					<div class="card-footer"></div>
				</div></div>
				@endcan
				<div class="col-md-8 col-xl-6 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
								<img src="https://2.bp.blogspot.com/-8ytYF7cfPkQ/WkPe1-rtrcI/AAAAAAAAGqU/FGfTDVgkcIwmOTtjLka51vineFBExJuSACLcBGAs/s320/31.jpg" class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span>{{ $voyant->name }}</span>
									<p>note: {{ $voyant->note }}</p>



								</div>
								
							</div>
							<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
							<div class="action_menu">
								<ul>
									<li><i class="fas fa-user-circle"></i> Voir la biographie</li>
									<li><i class="fas fa-users"></i> ajouter à mes favoris</li>
									<li><i class="fas fa-plus"></i> noter</li>
									<li><i class="fas fa-ban"></i> remercier</li>
								</ul>
							</div>
						</div>
						<div class="card-body msg_card_body"  id="msg_card_body">
							<div class="d-flex justify-content-start mb-4">
								<div class="img_cont_msg">
									<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
								</div>
								<div class="msg_cotainer">
									Bonjour invité veuillez choisir un nombre entre 1 et 5
									<span class="msg_time">8:40 AM, Today</span>
								</div>
							</div>
						<!--	 <div class="d-flex justify-content-end mb-4">
								<div class="msg_cotainer_send">
									Hi Khalid i am good tnx how about you?
									<span class="msg_time_send">8:55 AM, Today</span>
								</div>
								<div class="img_cont_msg">
                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
								</div>
							</div> -->
						</div>
						<div class="card-footer">
							<div class="error_warning danger" id="message_error"> </div>
							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text attach_btn"></span>
								</div>
								<textarea name="" id="msg_area" class="form-control type_msg"
                                 placeholder="Saisissez votre message..."></textarea>
								<div class="input-group-append" id="send_btn">
									<span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
