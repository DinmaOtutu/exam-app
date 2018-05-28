<?php
include_once('includes/konnect.php');
$status='';	

if(isset($_POST['fullname'])){
	$fullname = mysqli_real_escape_string($dbConnection,$_POST['fullname']);//for security to avoid hackers inserting msql injections....waka
	$dob = mysqli_real_escape_string($dbConnection,$_POST['dob']);
	$email = mysqli_real_escape_string($dbConnection,$_POST['email']);
	$pass1 = mysqli_real_escape_string($dbConnection,$_POST['pass1']);
	$city = mysqli_real_escape_string($dbConnection,$_POST['city']);
	$address = mysqli_real_escape_string($dbConnection,$_POST['address']);
	$pass2 = mysqli_real_escape_string($dbConnection,$_POST['pass2']);
	$mobile = mysqli_real_escape_string($dbConnection,$_POST['mobile']);
	
	if($fullname==''||$dob==''||$email==''||$pass1==''||$city==''||$address==''||$pass2==''||$mobile==''){$status = '<div class="alert alert-danger">Fill all fields</div>';}
	else if($pass1!=$pass2){$status = '<div class="alert alert-danger">Passwords dont match</div>';}
	else{
		$hashPassword = md5($pass1);
	$sql = "INSERT INTO members (fullname,email,telephone,dob,address,city,password,reg_date) VALUES ('$fullname','$email','$mobile','$dob','$address','$city','$hashPassword',now())";
	$query = mysqli_query($dbConnection,$sql) or die(mysqli_error($dbConnection));
	if($query){$status = '<div class="alert alert-success ">Great! Registration Successful! Go to Login</div>';}else {$status = '<div class="alert alert-warning ">There was an error!</div>';}
		}
	}

	
if(isset($_POST['username'])){
	$username = mysqli_real_escape_string($dbConnection,$_POST['username']);//for security to avoid hackers inserting msql injections....waka
	$password = mysqli_real_escape_string($dbConnection,$_POST['password']);
	
	if($username==''||$password==''){$status = '<div class="alert alert-danger">Fill all fields</div>';}
	else{
		$hpassword= md5($password);
		$sql= "SELECT id,email, password FROM members WHERE email='$username' AND password='$hpassword' LIMIT 1"; 
		$query=mysqli_query($dbConnection, $sql);
		if(mysqli_num_rows($query)<1){$status = '<div class="alert alert-danger ">Invalid login details</div>';}
		else{
			while($row = mysqli_fetch_array($query)){
  $memberid = $row[0];
  $memberemail= $row[1];
  $memberpassword = $row[2];
  //CREATE session that shows thAT YOU ARE A REGISTERED MEMBER OF EXAM TUSKY
  session_start();
  $_SESSION['memberid'] = $memberid;
  $_SESSION['memberemail'] = $memberemail;
  $_SESSION['memberpassword'] = $memberpassword;
  header('location:example.php'); exit();
 
  }
		}
		
	}
	}
?>
<?php 
//for those sending to u
if(isset($_POST['btnpost'])){
$email="otutudinma1995@gmail.com";
$sub=$_POST['subject'];
$msg= $_POST['message'];
$header = "From:".$_POST['email'];
if(mail($email,$sub,$msg,$header)){
	echo "successfully sent";
}
else{echo "message failed";

} 
}

?>

<?php 
/*FOR RESPONSE
$to=$_POST['email'];
$query="INSERT INTO `table_name`(`email`)value($to)";//email is for the name of the column for mail while value is email of the subsciber
mysqli_query($dbConnection,$query);//run this query on the above line
//$msg="thank you";//FOR CONSTANT
$query = "SELECT msg FROM `TABLE_NAME"
while(row=mysqli_query($dbConnection, $query)){
	$msg = row['msg'];
	
}	
	

$sub="WELCOME TO 2WEEKS BOOTCAMP";
$header="from:andela.com";
if(mail($to,$sub,$msg,$header)){
	echo "successfully sent";
}
else{
	echo "message failed";

} 
*/
?>
<!DOCTYPE html>
<html>
<head>
<title>ONLINE QUIZ </title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="online Examination" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="css/swipebox.css">
<link rel="stylesheet" href="css/jquery-ui.css" />
<!-- //css files -->
<!-- online-fonts -->
<link href="http://fonts.googleapis.com/css?family=Exo+2:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<!-- //online-fonts -->
</head>
<body>
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
			<div><img src="images/banner2.jpg" alt="" class="img-responsive"/> </div>
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
				<?php echo $status;?>
				<form action="" method="post" class="mod2">
					<div class="col-md-6 col-xs-6 w3l-left-mk">
						<ul>
							<li class="text">Name of Applicant :  </li>
							<li class="agileits-main"><i class="fa fa-user-o" aria-hidden="true"></i><input name="fullname" type="text" required=""></li>
							<li class="text">Date of Birth :  </li>
							<li class="agileits-main"><i class="fa fa-calendar" aria-hidden="true"></i><input class="date" id="datepicker" name="dob" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="" /></li>
							<li class="text"> Email address:  </li>
							<li class="agileits-main"><i class="fa fa-envelope-o" aria-hidden="true"></i><input name="email" type="email" required=""></li>
							 <li class="text">Password  :  </li>
							<li class="agileits-main"><i class="fa fa-lock" aria-hidden="true"></i><input name="pass1" type="password" required=""></li>
						</ul>
					</div>
					<div class="col-md-6 col-xs-6 w3l-right-mk">
						<ul>
							<li class="text">mobile no  :  </li>
							<li class="agileits-main"><i class="fa fa-phone" aria-hidden="true"></i><input name="mobile" type="text" required=""></li>
							<li class="text">Address  :  </li>
							<li class="agileits-main"><i class="fa fa-home" aria-hidden="true"></i><input name="address" type="text" required=""></li>
							 <li class="text">City
							<li class="agileits-main"><i class="fa fa-map-marker" aria-hidden="true"></i><input name="city" type="text" required=""></li>
							 <li class="text">Confirm Password  :  </li>
							<li class="agileits-main"><i class="fa fa-lock" aria-hidden="true"></i><input name="pass2" type="password" required=""></li>
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
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="signin-form profile">
					<h3 class="agileinfo_sign">Login</h3>	
					<div class="login-form">
						<form action="#" method="post">
							<input type="email" name="username" placeholder="E-mail" required="">
							<input type="password" name="password" placeholder="Password" required="">
							<div class="tp">
								<input type="submit" value="Login">
							</div>
						</form>
					</div>
					<div class="login-social-grids">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-rss"></i></a></li>
						</ul>
					</div>
					<p><a href="index.php" data-toggle="modal" data-target="#myModal3" > Don't have an account?</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="clearfix"> </div> 
	
<!---728x90--->
<!-- about -->
<div class="about-top" id="about">
	<div class="container">
		<h3 class="w3l-title">About Us</h3>
		<div class="w3layouts_header">
			<p><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
		</div>
		<div class="col-md-7 wthree-services-bottom-grids">
			<div class="wthree-services-left">
				<img src="images/ab1.jpg" alt="">
			</div>
			<div class="wthree-services-right">
				<img src="images/g2.jpg" alt="" style="width:450px;height:450px">
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="col-md-5 wthree-about-grids">
			<h4>Welcome to Our Online quiz</h4>
			<a href="#" class="trend-w3l" data-toggle="modal" data-target="#myModal"><span>Read More</span></a>
			<a href="#mail" class="trend-w3l scroll"><span>Get In Touch</span></a>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- modal -->
<div class="modal about-modal w3-agileits fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
			</div> 
			<div class="modal-body">
				<img src="images/g10.jpg" alt=""> 
				<p>We help with some neccessary materials on software development, and other programming courses that might be beneficial to our clients .</p>
			</p>
				</div>
		</div>
	</div>
</div>

<!-- services -->
<div class="services" id="services" >
	<div class="container">  
		<h3 class="w3l-title">Our Services</h3>
		<div class="w3layouts_header">
			<p><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
		</div>
		<div class="services-w3ls-row">
			<div class="col-xs-4 services-grid agileits-w3layouts">
				<span class="fa fa-graduation-cap" aria-hidden="true"></span>
				<h6>01</h6>
				<h5>Tutorials</h5>
				<p>We help with some neccessary materials on software development, and other programming courses that might be beneficial to our clients .</p>
			</div>
			<div class="col-xs-4 services-grid agileits-w3layouts">
				<h6>02</h6>
				<h5>Skilled programmers</h5>
				<p>My collegues and I have undergone some essential trainings. We can be able to put so many people through on web development and some programming languages.</p>
				<span class="fa fa-user-o grid-w3l-ser" aria-hidden="true"></span>
			</div>
			<div class="col-xs-4 services-grid agileits-w3layouts">
				<span class="fa fa-book" aria-hidden="true"></span>
				<h6>03</h6>
				<h5>Books and Library</h5>
				<p>With the aid of google, so many e-books,libraries and journals that are available and accessible for everyone, as long as you can access the internet.</p>
			</div> 
			<div class="clearfix"> </div>
		</div>  
	</div>
</div>

			
			<div class="col-md-4 col-xs-4 about-poleft t3" style="align:center">
				<div class="about_img"><img src="images/chidinma.jpeg" alt="" style="width:350px;height:350px">
				  <h5>Chidinma Otutu</h5>
				  <div class="about_opa">
					<p>software programmer</p>
					<ul class="fb_icons2 text-center">
						<li><a class="fa fa-facebook" href="www.facebook.com/louisde1"></a></li>
						<li><a class="fa fa-twitter" href="@otutudinma1995"></a></li>
						<li><a class="fa fa-google" href="otutudinma1995@gmail"></a></li>
						<li><a class="fa fa-linkedin" href="@otutudinma"></a></li>
					
					</ul>
				  </div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<!-- contact -->
<div id="mail" class="contact">
	<div class="container">
		<h3 class="w3l-title">Mail Us</h3>
		<div class="w3layouts_header">
			<p><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
		</div>
		<div class="agile_banner_bottom_grids">
			<div class="col-md-4 col-xs-4 w3_agile_contact_grid">
				<div class="agile_contact_grid_left">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
				</div>
				<div class="agile_contact_grid_right agilew3_contact">
					<h4>Address</h4>
					<p>plot 107 Nepa Road Kubwa Abuja</p>
					<p>FCT, Abuja</p>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 w3_agile_contact_grid">
				<div class="agile_contact_grid_left agileits_w3layouts_left">
					<i class="fa fa-mobile" aria-hidden="true"></i>
				</div>
				<div class="agile_contact_grid_right agileits_w3layouts_right">
					<h4>Phone</h4>
					<p>+2347062313448 <span>+2348110834217</span></p>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 w3_agile_contact_grid">
				<div class="agile_contact_grid_left agileits_w3layouts_left1">
					 <i class="fa fa-envelope-o" aria-hidden="true"></i>
				</div>
				<div class="agile_contact_grid_right agileits_w3layouts_right1">
					<h4>Email</h4>
					<p><a href="mailto:otutudinma1995@gmail.com ">otutudinma1995@gmail.com</a>
						<span><a href="mailto:info@example.com">cotutu1@gmail.com.com</a></span></p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="w3l-form">
			<h3 class="w3l-title">Get In Touch</h3>
			<div class="contact-grid1">
				<div class="contact-top1">
					<form action="#" method="post">
						<div class="col-md-6 col-xs-6 wthree_contact_left_grid">
							<label>Name*</label>
							<input type="text" name="name" placeholder="Name" required="">
							<label>E-mail*</label>
							<input type="email" name="email" placeholder="E-mail" required="">
						</div>
						<div class="col-md-6 col-xs-6 wthree_contact_left_grid">
							<label>Phone Number*</label>
							<input type="text" name="number" placeholder="Phone Number" required="">
							<label>Subject*</label>
							<input type="text" name="subject" placeholder="Subject" required="">
						</div>
						<div class="form-group">
							<label>Message*</label>
							<textarea placeholder name="message" required=""></textarea>
						</div>
							<input type="submit" name="btnpost" value="Send">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

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
		<p>© 2018. All rights reserved | Design by Otutu Dinma.</a></p>
	</div>
</div>
<!-- //footer -->

<!-- js-scripts -->			
<!-- js-files -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
<!-- //js-files -->
<!-- Baneer-js -->
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
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
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
<script src="js/jquery-ui.js"></script>
	<script>
	  $(function() {
		$( "#datepicker" ).datepicker();
	 });
	</script>
</body>
</html>