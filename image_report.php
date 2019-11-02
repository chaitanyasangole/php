<html>
	<?php 
	include 'header.php';
	include_once 'dbconfig.php'; ?>
	<?php 
		$sql='select id,name,image from binaryimageupload';
		$res=mysqli_query($con,$sql);
	?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Image</th>
			</tr>
		</thead>
		
		<tbody>
			<?php while($row=mysqli_fetch_array($res))
			{	
			?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><img width='400' height="400" 
				src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>"/></td>
			</tr>
			<?php 
			}
			?>
		</tbody>
	</table>
</html>