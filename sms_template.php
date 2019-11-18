<html>
	<head>
		<?php include 'header.php';?>
		<style>
			span
			{
				font-size:25px;
			}
		</style>
		<script>
			$(document).ready
			(function()
			{
				var charcount,numcounts;
				$('form').submit
				(function(e){
					e.preventDefault();
					alert('hello');
					
					$.ajax({
					data:$(this).serialize(),
					url:'dbfunction.php?action=insertsms',
					type:'post',	
					success:function(html)
					{
						console.log("inside success");
						console.log(html);
					},
					error:function(html)
					{
						console.log("inside error");
						console.log(html);
					}
					});
					//.reload();
				});
				
				$('#description').keyup(function()
				{
					charcount=$('#description').val();
					numcounts=parseInt(charcount.length/150);
					//alert(numcounts);
				});
				$('#description').blur(function(){
					console.log('character count'+charcount.length+"number of count"+numcounts);
					if(numcounts>0)
					{
						alert('your code will be printed');
						var str='';
						for(var i=1;i<=numcounts;i++)
						{
							if(i==numcounts)
							{
							str=str+'<h2><span class="badge badge-primary">'+i+'</span></h2>';
							}
							else
							{
							str=str+'<h2><span class="badge badge-primary">'+i+'</span>'+'</h2>'
							+'<pre> </pre>';
							}
						}
						$('#show').html(str);
					}
				});
					/*
						for(int i=0;i<charcount;i++)
						{
							
						}
						
						$('#show').html();*/
				});
			//});
		</script>
	</head>
	<body class="bg-light"><br><br>
	<div class="row" style="margin-left:0px;margin-right:0px;">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<form method="post">
			<div class="card shadow">
				<div class="card-header display-4 text-center">
					Sms Template
				</div>
				<div class="card-body">
					<div class="form-group">
						<label for="smstext">Title:</label>
						<input type="text" name="smstext" id="smstext"
						required class="form-control">
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea name="description" class="form-control"
						rows="5" id="description" required></textarea>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<button type="submit" class="btn btn-outline-primary btn-block">
								Submit
							</button>
						</div>
						<div class="col-sm-6">
							<button type="reset" class="btn btn-outline-danger btn-block">
								Reset
							</button>
						</div>
					</div>
				</div>
			</div>
			</form>
			<div class="row" id="show"></div>
		</div>
		<div class="col-sm-4"></div>
	</div>
	</body>
</html>