<?php
include_once('includes/checklog.php');
$questionList='';
$sql= "SELECT id,question,a,b,c,d FROM questions ORDER BY RAND() LIMIT 20"; 
		$query=mysqli_query($dbConnection, $sql);
		$i=1;
		while($row = mysqli_fetch_array($query)){
  $qID = $row[0];
  $qQuestion = $row[1];
  $qA = $row[2];
  $qB = $row[3];
  $qC = $row[4];
  $qD = $row[5];
 $questionList .='<div style="padding:10px; background:#000; margin: 10px">
	
	<div class="questions" style="font-size:15px; font-weight:bold;color:#84C639">
	Question '.$i++.': '.$qQuestion.'
	</div>
	<div style="padding:15px; color:#fff margin: 10px";>
<label class="optionToChoose" style="color:#fff";><input type= "radio" class="rad" name = "'.$qID.'" value = "a" /><span id="option1">'.$qA.'</span></label><br>
<label class="optionToChoose"style="color:#fff";><input type= "radio" class="rad"  name = "'.$qID.'" value = "b" /><span id="option2">'.$qB.'</span></label><br>
<label class="optionToChoose" style="color:#fff";><input type= "radio" class="rad" name = "'.$qID.'" value = "c" /><span id="option3">'.$qC.'</span></label><br>
<label class= "optionToChoose" style="color:#fff";><input type= "radio" class="rad"  name = "'.$qID.'" value = "d" /><span id="option4">'.$qD.'</span></label><br>
</div>

</div>';  
  }


?>


<!DOCTYPE html>
<html>
<head>
<title><?php echo $memberfullname?>
ONLINE EXAM
</title>
<style>
.container{
	background:40001a;
}
	
</style>
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
				
			<h1><a class="navbar-brand" href="index.php"><i class="fa fa-leanpub" aria-hidden="true"></i> EXAMINATION</a></h1>

			</div>
			<ul class="agile_forms">
				<li><a class="active" href="logout.php" data-toggle="modal" data-target="#myModal2"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a> </li>
			</ul>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<nav class="link-effect-2" id="link-effect-2">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php" class="effect-3">Home</a></li>
						
					</ul>
				</nav>

			</div>
		</nav>	
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
			<h1 style="color:#fff; text-align:center"><i aria-hidden="true"></i> WELCOME!<br><span><?php echo $memberfullname ?></span></a></h1>

			</div>
		</nav>	
		<div class="clearfix"> </div> 
	</div>
</div>
		<div class="navbar-header navbar-left">
		
		
				
			

			</div>
<div id = "quizContainer" class = "container">
	
	<div class = "titleContainer"> QUIZ
	
	</div>
	


	<?php echo $questionList ?>
	
	<button type="submit" style="border-radius:20px;height:50px; border:2px #fff solid; width:200px; float:right; background: #000; color:#84C639">Submit Examination</button>

</div>

<div id= "result" class="resultContainer" style= "display:none;">
</div>
			
		</body>
		</html>