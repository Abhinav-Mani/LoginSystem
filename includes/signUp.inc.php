<?php 
include 'dbh.con.inc.php';
session_start();
$name=mysqli_real_escape_string($conn,$_POST['SignUpName']);
$username=mysqli_real_escape_string($conn,$_POST['SignUpUsername']);
$email=mysqli_real_escape_string($conn,$_POST['SignUpEmail']);
$Password=mysqli_real_escape_string($conn,$_POST['SignUpPassword']);
$RePassword=mysqli_real_escape_string($conn,$_POST['SignUpPasswordConfirm']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
if(!isset($_POST['SignUP']))
{
	echo "error";
}
elseif (empty($name)||empty($username)||empty($email)||empty($Password)||empty($RePassword)||empty($gender)) {
	if(!preg_match("/^[a-zA-Z]*$/", $name))
	{
		header("Location: ../index.php?name=invalid&username=$username&email=$email&gender=$gender&SignUP=Empty");
	}
	else
	{
		header("Location: ../index.php?name=$name&username=$username&email=$email&gender=$gender&SignUP=Empty");
	}
	
}
elseif (!preg_match("/^[a-zA-Z]*$/", $name)) {
	header("Location: ../index.php?name=invalid&username=$username&email=$email&gender=$gender&SignUP=InvalidInput");
}
elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	header("Location: ../index.php?name=$name&username=$username&email=invalid&gender=$gender&SignUP=InvalidInput");
}
elseif ($Password!==$RePassword) {
	header("Location: ../index.php?name=$name&username=$username&email=$email&gender=$gender&SignUP=PasswordMissmatch");
}
else
{
	$sql1="SELECT * FROM `users` WHERE USERNAME = ? " ;
	$stmt1=mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt1,$sql1)) {
		echo "SQL error in check";
	}
	else
	{
		mysqli_stmt_bind_param($stmt1,"s",$username);
		mysqli_stmt_execute($stmt1);
		$result=mysqli_stmt_get_result($stmt1);
		if(mysqli_num_rows($result)>0)
		{
			header("Location: ../index.php?name=$name&username=$username&email=$email&gender=$gender&SignUP=InvalidUsername");
		}
		else
		{
			$sql2="INSERT INTO users (username, name, email, password, gender) VALUES (?,?,?,?,?)";
			$stmt2=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt2,$sql2))
			{
				echo "Sql error";
			}
			else
			{
				mysqli_stmt_bind_param($stmt2,"sssss",$username,$name,$email,$Password,$gender);
				mysqli_stmt_execute($stmt2);
				$_SESSION['username']=$username;
				header("Location: ../index.php?name=$name&username=$username&email=$email&gender=$gender&SignUP=Success");
				
			}
		}
	}

}

 ?>