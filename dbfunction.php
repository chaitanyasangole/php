<?php 
	//include 'header.php';// include header files
	include 'dbconfig.php';// include db connection
	
	if($_REQUEST['action']=='Updating_votes')
	{
		switch($_POST['vote'])
		{
				case 'bjp':
				$sql1="select bjp from poll";
				$res=mysqli_query($con,$sql1);
				$row=mysqli_fetch_assoc($res);
				$row['bjp']++;
				$sql2="update poll set bjp=".$row['bjp'];
				mysqli_query($con,$sql2);
				//echo 'your vote is given to '.$_POST['vote'];
				
				break;
				
				case 'congress':
				$sql1="select congress from poll";
				$res=mysqli_query($con,$sql1);
				$row=mysqli_fetch_assoc($res);
				$row['congress']++;
				$sql2="update poll set congress=".$row['congress'];
				mysqli_query($con,$sql2);
				
				//echo 'your vote is given to '.$_POST['vote'];
				break;
				
				case 'other':
				$sql1="select other from poll";
				$res=mysqli_query($con,$sql1);
				$row=mysqli_fetch_assoc($res);
				$row['other']++;
				$sql2="update poll set other=".$row['other'];
				mysqli_query($con,$sql2);
				
				//echo 'your vote is given to '.$_POST['vote'];
				break;
				
				case 'rashtrawadi':
				$sql1="select rashtrawadi from poll";
				$res=mysqli_query($con,$sql1);
				$row=mysqli_fetch_assoc($res);
				$row['rashtrawadi']++;
				$sql2="update poll set rashtrawadi=".$row['rashtrawadi'];
				echo $data;
				//echo 'your vote is given to '.$_POST['vote'];
				break;
				
				case 'shivsena':
				$sql1="select shivsena from poll";
				$res=mysqli_query($con,$sql1);
				$row=mysqli_fetch_assoc($res);
				$row['shivsena']++;
				$sql2="update poll set shivsena=".$row['shivsena'];
				mysqli_query($con,$sql2);
				//echo 'your vote is given to '.$_POST['vote'];
				break;
				
				default:
				echo 'record not matched';
				break;
		}
				$data=mysqli_query($con,"select * from poll");
			echo'
			<tr>
				<th>BJP</th><td>'.$data['bjp'].'</td>
			</tr>
			<tr>
				<th>Congress</th><td>'.$data['congress'].'</td>
			</tr>
			<tr>
				<th>Shivsena</th><td>'. $data['shivsena'].'</td>
			</tr>
			<tr>
				<th>Rashtrawadi</th><td>'. $data['rashtrawadi'].'</td>
			</tr>
			<tr>
				<th>Other</th><td>'. $data['other'].'</td>
			</tr>';
	}
	
	if($_REQUEST['action']=='submitform')
	{
		//var_dump($_REQUEST);exit;
		$name=$_REQUEST['name'];
		$dob=$_REQUEST['dob'];
		$email=$_REQUEST['email'];
		$contact=$_REQUEST['mobile'];
		$address=$_REQUEST['address'];
		$sql="insert into form
		(name,dob,email,mobile,address) 
		values('$name','$dob','$email',$contact,'$address')";
		if(mysqli_query($con,$sql))
		{
			echo 'data inserted';
			header('location:form_report.php');
		}
		else
		{
			echo 'data not inserted'.mysqli_error($con);
		}
	}
	if($_REQUEST['action']=='updateform')
	{
		//var_dump($_REQUEST);exit;
		$id=$_REQUEST['recordid'];
		$name=$_REQUEST['name'];
		$dob=$_REQUEST['dob'];
		$email=$_REQUEST['email'];
		$contact=$_REQUEST['mobile'];
		$address=$_REQUEST['address'];
		echo $id.$_REQUEST['recordid'];
		$sql="update form set name='$name',dob='$dob',email='$email',mobile='$contact',
		address='$address' where id=$id";
		if(mysqli_query($con,$sql))
		{
			echo 'data updated';
			header('location:form_report.php');
		}
		else
		{
			echo 'data not updated'.mysqli_error($con);
		}
	}
	
	if($_REQUEST['action']=='getrecord')
	{
		$id=$_REQUEST['id'];
		$sql='select * from form where id='.$id;
		$res=mysqli_query($con,$sql);
		if(mysqli_num_rows($res)>0)
		{
		$row=mysqli_fetch_array($res);
		$row['status']='success';
		$row['message']='data found';
		echo json_encode($row);
		}
		else
		{
		$arr=array('status'=>'error','message'=>'data not found');
		echo json_encode($arr);
		}
	}
	else
	{
	}
	if($_REQUEST['action']=='deleterecord')
	{
		$id=$_REQUEST['id'];
		
		//exit;
		$sql='delete from form where id='.$id;
		//echo $sql;
		mysqli_query($con,$sql);
		header('location:form_report.php');
		//echo getRecords($con);
	}
	function getRecords($con)
	{
		$sql='select * from form';
		$res=mysqli_query($con,$sql);
		$str='';
		while($row=mysqli_fetch_assoc($res))
		{
			$str.='<tr><td>'.$row['name'].'</td><td>'.$row['dob'].
			'</td><td>'.$row['mobile'].'</td><td>'.$row['email'].
			'</td><td>'.$row['address'].'</td><td><button type="button" class="btn btn-outline-primary"
				value='.$row["id"].'>Edit</button></td>
				<td><button type="button" class="btn btn-outline-danger"
				value="delete_'.$row["id"].'">Delete</button></td>
			</tr>';
		}
		return $str;
	}
	if($_REQUEST['action']=='insertsms')
	{
		$title=$_POST['smstext'];
		$description=$_POST['description'];
		$sql='insert into sms(title,description)values("'.$title.'","'.$description.'")';
		echo $title.$description;
		echo $sql;
		if(mysqli_query($con,$sql))
		{
			echo 'success';
		}
		else
		{
			echo 'error'.mysqli_error($con);
		}
	}
	if($_REQUEST['action']=='demoform')
	{
		print_r($_REQUEST);
		exit;
	}
	if($_REQUEST['action']=='getDescription')
	{
		$id=$_REQUEST['title'];
	if($id=='')
	{
		echo "Field is empty";
	}
	else
	{
			$sql="select description from sms where id=$id";
		if($res=mysqli_query($con,$sql))
		{
		$row=mysqli_fetch_array($res);
		}
		//echo $id . $sql;
		if(mysqli_num_rows($res)>0)
		{
			$arr=array('data'=>$row['description'],'status'=>'success');
			//echo $row['description'];
			echo json_encode($arr);
			//json_encode ($row['description']);
		}
		else
		{
			$arr2=array('data'=>'','status'=>'fail');
			echo json_encode($arr2);
		}
	
	}
	}
?>