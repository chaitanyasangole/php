<?php
	include 'dbconfig.php';
	var_dump($_POST);
	var_dump($_FILES);
	//exit;
	$file=addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$name=$_POST["name"];
	$sql='insert into binaryimageupload(name,image) values("'.$name.'","'.$file.'")';
	echo $sql;
	if(mysqli_query($con,$sql))
	{
		echo 'data inserted' ;
	}
	else
	{
		echo 'data not inserted'.mysqli_error($con) ;
	}
	
	mysqli_close($con);
?>