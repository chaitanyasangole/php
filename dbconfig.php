<?php 
	
	$ip='localhost';
	$username='root';
	$password='';
	if(!$con=mysqli_connect($ip,$username,$password))
	{
		$msg=mysqli_connect_error();
		echo $msg;
		die();
	}
	else
	{
	echo 'db connect';
	mysqli_select_db($con,'practice')or die('Could not connect to the database');
	}
?>