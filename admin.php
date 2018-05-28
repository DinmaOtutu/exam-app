<?php
include_once('includes/konnect.php');
$status='';	

if(isset($_POST['question'])){
	$question = mysqli_real_escape_string($dbConnection,$_POST['question']);
	$a = mysqli_real_escape_string($dbConnection,$_POST['a']);
	$b = mysqli_real_escape_string($dbConnection,$_POST['b']);
	$c = mysqli_real_escape_string($dbConnection,$_POST['c']);
	$d = mysqli_real_escape_string($dbConnection,$_POST['d']);
	$correct = mysqli_real_escape_string($dbConnection,$_POST['correct']);
	
	if($question==''||$a==''||$b==''||$c==''||$d==''||$correct==''){$status = '<div class="alert alert-danger">Fill all fields</div>';}
	//else if($pass1!=$pass2){$status = '<div class="alert alert-danger">Passwords dont match</div>';}
	else{
	$sql = "INSERT INTO questions (question,a,b,c,d,correct) VALUES ('$question','$a','$b','$c','$d','$correct')";
	$query = mysqli_query($dbConnection,$sql) or die(mysqli_error($dbConnection));
	if($query){$status = '<div class="alert alert-success ">Great! Question Posted</div>';}else {$status = '<div class="alert alert-warning ">There was an error!</div>';}
		}
	}

?>


<html><head>
<title>ONLINE QUIZ </title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="online Examination">
<script type="text/javascript" id="www-widgetapi-script" src="https://s.ytimg.com/yts/jsbin/www-widgetapi-vfl9Xan6S/www-widgetapi.js" async=""></script><script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all"> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="css/swipebox.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<!-- //css files -->
<!-- online-fonts -->
<link href="http://fonts.googleapis.com/css?family=Exo+2:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<!-- //online-fonts -->
</head>
<body><div style="position:fixed;top:0px;left:0px;width:0;height:0;" id="scrollzipPoint"></div>
<!-- banner -->
<div class="main_section_agile" id="home">
	<div class="agileits_w3layouts_banner_nav">
		<nav class="navbar navbar-default">
			<div class="navbar-header navbar-left">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			<h1><a class="navbar-brand" href="index.html"><i class="fa fa-leanpub" aria-hidden="true"></i> EXAMINATION</a></h1>

			</div>
			<ul class="agile_forms">
				<li><a class="active" href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a> </li>
			</ul>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<nav class="link-effect-2" id="link-effect-2">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.html" class="effect-3">Home</a></li>
						<li><a href="#about" class="effect-3 scroll">About Us</a></li>
						<li><a href="#services" class="effect-3 scroll">Services</a></li>
						<li><a href="#mail" class="effect-3 scroll">Mail Us</a></li>
					</ul>
				</nav>

			</div>
		</nav>	
		<div class="clearfix"> </div> 
	</div>
</div>
<!-- banner -->
<div class="about-bottom">
	<div class="col-md-6 w3l_about_bottom_left">
		<div class="video-grid-single-page-agileits">
			<div><img src="images/banner2.jpg" alt="" class="img-responsive"> </div>
			<div class="w3l_about_bottom_left_video">
			<h4 class="textmiddle">Welcome to your prefered online examination page<br>fill the application form, sign up and then login to begin your quiz </h4>
		</div>
		</div>
		<div class="w3l_about_bottom_left_video">
			<h4></h4>
		</div>
	</div>
	<div class="col-md-6 w3l_about_bottom_right one">
		<div class="abt-w3l">
			<div class="header-w3l">
				<h2>Registration Form</h2>
				<h4>Enter the Following Details</h4>
				<?php echo $status?>
								<form action="" method="post" class="mod2">
					<div class="col-md-6 col-xs-6 w3l-left-mk">
						<ul>
							<li class="text">Question :  </li>
							<li class="agileits-main"><i class="fa fa-user-o" aria-hidden="true"></i><textarea name="question" required="" rows=7></textarea></li>
						</ul>
					</div>
					<div class="col-md-6 col-xs-6 w3l-right-mk">
						<ul>
							<li class="text">Option A  :  </li>
							<li class="agileits-main"><i class="fa fa-phone" aria-hidden="true"></i><input name="a" type="text" required=""></li>
							<li class="text">Option B  :  </li>
							<li class="agileits-main"><i class="fa fa-home" aria-hidden="true"></i><input name="b" type="text" required=""></li>
							 <li class="text">Option C
							</li><li class="agileits-main"><i class="fa fa-map-marker" aria-hidden="true"></i><input name="c" type="text" required=""></li>
							 <li class="text">Option D  :  </li>
							<li class="agileits-main"><i class="fa fa-lock" aria-hidden="true"></i><input name="d" type="text" required=""></li>
							 <li class="text">Correct Answer :  </li>
							<li class="agileits-main"><i class="fa fa-lock" aria-hidden="true"></i><input name="correct" type="text" required=""></li>
						</ul>
					</div>
					<div class="clearfix"></div>
					<div class="agile-submit">
						<input type="submit" value="submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- //banner -->
<!-- Modal1 -->

<!-- //Modal1 -->	
<!-- Modal2 -->
 
<!-- //Modal2 -->	
<!---728x90--->
<!-- about -->
<div class="about-top" id="about">
	<div class="container">
		
		
		
		
		
	</div>
</div>
<!-- modal -->

<!-- //modal --> 
<!-- //about -->
<!---728x90--->

<!--//stats-->
<!---728x90--->
<!-- services -->


			
			
			
		
		
			
		
	

<!-- //team -->
<!-- contact -->

<!-- <div id="map"></div> -->
<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="wthree_footer_grid_left">
			<div class="col-md-3 col-xs-3 wthree_footer_grid_left1">
				<h4>About Us</h4>
				<p>We provide you a platform.</p>
			</div>
			<div class="col-md-3 col-xs-3 wthree_footer_grid_left1">
				<h4>Navigation</h4>
				<ul>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="index.html">Home</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#about" class="scroll">About Us</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#services" class="scroll">Services</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#mail" class="scroll">Mail Us</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-3 wthree_footer_grid_left1 w3l-3">
				<h4>Others</h4>
				<ul>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Media</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Mobile Apps</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Privacy Policy</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-3 wthree_footer_grid_left1 wthree_footer_grid_right1">
				<h4>Contact Us</h4>
				<ul>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:info@example.com">otutudinma1995@gmail.com</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>+2347062313448</li>
					<li><i class="fa fa-fax" aria-hidden="true"></i>+2348110834217</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="w3layouts_copy_right">
	<div class="container">
		<p>© 2018. All rights reserved | Design by Otutu Dinma.</p>
	</div>
</div>
<!-- //footer -->

<!-- js-scripts -->			
<!-- js-files -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
<!-- //js-files -->
<!-- Baneer-js -->

<!-- <!-- Map-JavaScript --> --&gt;
			<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>         -->
			<!-- <script type="text/javascript"> -->
				<!-- google.maps.event.addDomListener(window, 'load', init); -->
				<!-- function init() { -->
					<!-- var mapOptions = { -->
						<!-- zoom: 11, -->
						<!-- center: new google.maps.LatLng(40.6700, -73.9400), -->
						<!-- styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}] -->
					<!-- }; -->
					<!-- var mapElement = document.getElementById('map'); -->
					<!-- var map = new google.maps.Map(mapElement, mapOptions); -->
					<!-- var marker = new google.maps.Marker({ -->
						<!-- position: new google.maps.LatLng(40.6700, -73.9400), -->
						<!-- map: map, -->
					<!-- }); -->
				<!-- } -->
			<!-- </script> -->
		<!-- <!-- //Map-JavaScript --> --&gt;

<!-- smooth scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<!-- //smooth scrolling -->
<!-- stats -->
<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<!-- //stats -->
<!-- moving-top scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#home" class="scroll" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 0;"></span> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //moving-top scrolling -->
<!-- gallery popup -->
<script src="js/jquery.swipebox.min.js"></script> 
<script type="text/javascript">
jQuery(function($) {
	$(".swipebox").swipebox();
});
</script>
<!-- //gallery popup -->
<!--/script-->
	<script src="js/simplePlayer.js"></script>
			<script>
				$("document").ready(function() {
					$("#video").simplePlayer();
				});
			</script>
<!-- //Baneer-js -->
<!-- Calendar -->
<script src="js/jquery-ui.js"></script>
	<script>
	  $(function() {
		$( "#datepicker" ).datepicker();
	 });
	</script>
<!-- //Calendar -->	

<!-- //js-scripts -->

<a href="#" id="toTop">To Top</a><div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div></body></html>