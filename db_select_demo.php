<html>
	<?php 
		include 'header.php';
		include 'dbconfig.php';
		$res=mysqli_query($con,'select id,title from sms');
	?>		
		
	<head></head>
	<body>
		<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><br>
		<form action="#" method="post">
		<div class="card">
		<div class="card-header display-4 text-center">Sms SendTemplate</div>
		<div class="card-body">
		<div class="form-group">
		<label for='title'>Title</label>
		<select name="title" id="title" class="form-control" required>
		<option value="">Please, select any Title</option>
	<?php 
		while($row=mysqli_fetch_assoc($res))
		{
		?>
			<option value="<?php echo $row['id'];?>"><?php echo $row['title']; ?></option>
		<?php
		}
		mysqli_close();
	?>
		</select>
		</div>
		<div class="form-group">
		<label for='description'>Textarea:</label>
		<textarea name="description" rows="5" 
		id="description" class="form-control" 
		readonly required>value="Hello chaitany"</textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		</div>
		</form>
		</div>
		<div class="col-sm-4"></div>
		</div>
	</body>
	<script>
		$(document).ready(function(){
			
			alert($('#description').text());
			$('#description').text("hi");
			$('#title').change(function(){
				$title=$('#title').val();
				$.ajax(
				{
					url:'dbfunction.php?action=getDescription',
					data:'title='+$title,
					type:'post',
					success:function(data)
					{
						var jsondata=JSON.parse(data);
						var status=jsondata.status;
						var data=jsondata.data;
						console.log('data='+data
						+'\status='+status);
						
						if(data==''&&status=='fail')
						{
							$('#description').text('');
						}
						else
						{
							$('#description').text(data);
						}
					},
					error:function(html)
					{
						console.log('data='+data+' status='+status);
						$('#description').text();
					}
				});
			});
			
		});
	</script>
</html>