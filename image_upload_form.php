<html>
	<head>
	<?php include 'header.php'?>
	</head>
	<body class="">
	<form action="img_store_as_blob.php" method="post" enctype='multipart/form-data'>
		<div class="row" style="margin-right:0px;margin-left:0px;">
			<div class="col-sm-4"></div>
			<div class="col-sm-4"><br><br>
				<div class="card shadow-sm p4">
					<div class="card-header display-4 text-center shadow-sm">
						Image Upload
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" id='name' 
							name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="image">Upload File:</label>
							<input type="file" name="image" required 
							id="image" class="form-control-file border">
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
			</div>
			<div class="col-sm-4"></div>
		</div>
	</form>
	</body>
</html>