<?php 
include 'header.php';
?>
<html>
<body class="bg-info">
<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
			<br>
		<div class="card">
			<div class="card-header">
				<div class="display-4 text-center">File Upload</div>
			</div>
			<div class="card-body">
				<form method="post" action="file_upload_demo_php_file.php" enctype="multipart/form-data">
					<div class="form-group">
					<label for="file1">Upload Image</label>
					<div class="form-group">
					<input type="file" name="file" id="file1" class="form-control-file border" required>
					</div>
					<div class="row">
					<div class="col-sm-6">
					<button type="submit" class="btn btn-outline-primary btn-block">Submit</button>
					</div>
					<div class="col-sm-6">
					<button type="reset" class="btn btn-outline-danger btn-block">Cancel</button>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-4"></div>
</div>
</body>
</html>