<?php 
	//var_dump($_FILES);
	if(isset($_FILES['file']['name']))
	{
		echo "file name=".$_FILES['file']['name']."<br>";
		echo "file type=".$_FILES['file']['type']."<br>";
		echo "file temporary name=".$_FILES['file']['tmp_name']."<br>";
		echo "file error=".$_FILES['file']['error']."<br>";
		echo "file size=".($_FILES['file']['size']/1024)."Kb<br>";
		$path='../upload_file/';
		$targetfile=$path.basename($_FILES['file']['name']);
		
		if(file_exists($targetfile))
		{
			echo "Sorry, file already exist";
			exit;
		}
		$size=$_FILES['file']['size']/1024;
		if($size<1024)
		{
			echo "Sorry file is exceeeding the limit";
			exit;
		}
			move_uploaded_file($_FILES['file']['tmp_name'],$targetfile);
			echo "The file has been uploaded";
	}
	else
	{
		echo "request does not match";
	}
?>