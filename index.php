<?php 
	require 'php/actions/userAction.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			background: grey;
		}
		body .users{
			width: 500px;
			margin: auto;
			background: lightgrey;
			padding: 10px;
			min-height: 500px;
		}
		.users table{
			width: 100%;
			background: white;
		}

		.users ul {
			margin: 0;
			padding: 0;
		}

	</style>
</head>
<body>

	<div class="users">

		<div>
			<ul>

				<?php if($output){ foreach ($output->getMessage() as $value) { ?>

					<li> <?php echo $value; ?> </li>

				<?php } } ?>

			</ul>
		</div>

		<form action="index.php" method="POST"> 
			<input type="text" name="fname" placeholder="First Name">
			<br>
			<input type="text" name="lname" placeholder="Lst Name">
			<br>
			<input type="text" name="age" placeholder="Age">
			<hr>
			<button type="submit">Add</button>
			<a href="upload.php">Upload Files</a>
		</form>
		<br>
		<table border="2">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Age</th>
			</tr>
			
			<?php foreach(getUsers() as $user){ ?>
				<tr>
					<td> <?php echo $user['fname']; ?> </td>
					<td> <?php echo $user['lname']; ?> </td>
					<td> <?php echo $user['age']; ?> </td>
				</tr>
			<?php } ?>

			</tr>
		</table>
	</div>

</body>
</html>