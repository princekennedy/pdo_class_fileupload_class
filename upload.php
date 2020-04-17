<?php 
	require 'php/actions/uploadFiles.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			background: grey;
		}
		body .form-wrapper{
			width: 500px;
			margin: auto;
			background: lightgrey;
			padding: 10px;
			min-height: 500px;
		}
	</style>
</head>
<body>

	<div class="form-wrapper">
		
		<div>
			<ul>

				<?php if($output){ foreach ($output->getMessage() as $value) { ?>

					<li> <?php echo $value; ?> </li>

				<?php } } ?>

			</ul>
		</div>

		<form action="upload.php" method="POST" enctype="multipart/form-data"> 
			<input type="file" name="file[]" multiple>
			<hr>
			<button type="submit">Upload</button> <br><br>
			<a href="index.php">Users</a>
		</form>
	</div>

</body>
</html>