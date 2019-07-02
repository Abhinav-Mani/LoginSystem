<?php 
session_start();
if (isset($_SESSION['username'])) {
	header("Location: welcome.php");
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" type="text/css" href="Style/bootstrap.css">
 	<link rel="stylesheet" type="text/css" href="Style/style.css">
 	<title>MyblogLO</title>
 </head>
 <body>
 	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" data-spy="affix">
 		<div class="container">
 		<div class="navbar-header" >
 		<a class="navbar-brand" href="#">
 			<img src="res/logo.PNG" width="100" height="100" style="border-radius: 50%">
 		</a>
 		</div>
 			 <form class="form-inline my-2 my-lg-0" action="includes/signIn.inc.php" method="POST" >
		      <input class="form-control mr-sm-2" type="text" placeholder="Username" aria-label="Username" name="Username">
		      <input class="form-control mr-sm-2" type="Password" placeholder="Password" aria-label="Password" name="Password">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="signIn">Login</button>
		    </form>
		</div>
 		
 	</nav>
 	<div class="container" id="body">
 		<!-- <img src="res/left.jpg"> -->
 		<div class="row" id="body-left">

 			<div class="col-sm-6">
 				
 				


 			</div>
 			<div class="col-sm-6">
 				<form id="SignUp" method ="POST" action="includes/signUp.inc.php">
 					<div class="form-group">

 					<?php 

 					if (!isset($_GET['name'])) {
 						
 						echo '<input class="form-control mr-sm-2" type="text" name="SignUpName" placeholder="Name">';
 						
 					}
 					else{
 						$name=$_GET['name'];
 						if ( (isset($_GET['SignUP'])&&$_GET['SignUP']=='InvalidName') ||$name=='invalid') {
 							echo '<input class="form-control mr-sm-2" type="text" name="SignUpName" placeholder="Name">';
 							echo "<div class='error'>Invalid Name</div>";
 							

 						}
 						else
 						{
 							echo '<input class="form-control mr-sm-2" type="text" name="SignUpName" placeholder="Name" value="'.$name.'">';
 						}
 					 	
 					 } 
 					?>
 					
 					</div>
 					<div class="form-group">
 					<?php 
 					if (!isset($_GET['username'])||$_GET['username']=='') {
 						echo '<input class="form-control mr-sm-2" type="text" name="SignUpUsername" placeholder="UserName">';
 					}
 					else
 					{
 						$username=$_GET['username'];
 						echo '<input class="form-control mr-sm-2" type="text" name="SignUpUsername" placeholder="'.$username.'">';
 					}
 					 ?>					
 					</div>
 					<div class="form-group">
 					<?php
 					if (!isset($_GET['email'])||$_GET['email']=='') {
 					 	echo '<input class="form-control mr-sm-2" type="text" name="SignUpEmail" placeholder="Email">';
 					 }
 					 else
 					 {
 					 	$email=$_GET['email'];
 					 	echo '<input class="form-control mr-sm-2" type="text" name="SignUpEmail" placeholder="Email" value="'.$email.'">';
 					 } 
 					 ?>
 					
 					</div>
 					<?php
 					if (!isset($_GET['gender'])) {
 						echo '

	 						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="Male" >
						  <label class="custom-control-label" for="customRadioInline1">Male</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="Female">
						  <label class="custom-control-label" for="customRadioInline2">Female</label>
						</div>

 						';
 					}
 					elseif ($_GET['gender']=='Male') {
 						echo '

	 						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="Male" checked="true">
						  <label class="custom-control-label" for="customRadioInline1">Male</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="Female">
						  <label class="custom-control-label" for="customRadioInline2">Female</label>
						</div>

 						';
 						
 					}
 					else
 					{
 						echo '

	 						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="Male" >
						  <label class="custom-control-label" for="customRadioInline1">Male</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="Female" checked="true">
						  <label class="custom-control-label" for="customRadioInline2">Female</label>
						</div>

 						';

 					}
 					  ?>
 					
 					

 					<div class="form-group">
 					<input class="form-control mr-sm-2" type="Password" autocomplete="new-password" name="SignUpPassword" placeholder="Password">
 					</div>
 					<div class="form-group">
 					<input class="form-control mr-sm-2" type="Password" autocomplete="new-password" name="SignUpPasswordConfirm" placeholder="Re-Enter Password">
 					</div>
 					<?php 
 					if (isset($_GET['SignUP'])) {
 						if ($_GET['SignUP']=='PasswordMissmatch') {
 							echo "<div class='error'>Password does not match</div>";
 						}
 						
 					}

 					 ?>
 					<div class="form-group">
 					<input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="SignUP" value ="SignUp">
 					</div>
 				</form>
 			</div>
 			
 		</div>
 		
 	Site under Construction	
 	</div>
 	
 
 </body>
 </html>