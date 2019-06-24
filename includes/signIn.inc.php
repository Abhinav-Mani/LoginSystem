<?php
include 'dbh.con.inc.php';
session_start();
$username=mysqli_real_escape_string($conn,$_POST['Username']);
$Password=mysqli_real_escape_string($conn,$_POST['Password']);
// $username=$_POST['Username'];
// $Password=$_POST['Password'];
if (!isset($conn)) {
	echo "Server Not Connected";
}
$sql= "SELECT * FROM `users` WHERE USERNAME= ? AND Password=? ";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{
	echo "SQL Error";
}
else {
	mysqli_stmt_bind_param($stmt,"ss",$username,$Password);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	if( mysqli_num_rows($result)>0)
	{
		while ($rows=mysqli_fetch_assoc($result) ){
			$_SESSION['username'] =$username ;
			
		}
	}
}

header("Location: ../index.php?sighnup");