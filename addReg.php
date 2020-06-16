<?php
	require('confign/config.php');
	require('confign/dbconn.php');
	
	//checking submit
	if(isset($_POST['submit'])){
		//get data from form
		$name= mysqli_real_escape_string($conn,$_POST['name']);
		$email= mysqli_real_escape_string($conn,$_POST['email']);
		$phone= mysqli_real_escape_string($conn,$_POST['phone']);
		$branch= mysqli_real_escape_string($conn,$_POST['branch']);

		$query = "INSERT INTO form(name,email,phone,branch) VALUES('$name','$email','$phone','$branch')";
		
		if(mysqli_query($conn,$query)){
			header('Location: '.ROOT_URL.'');
		}
		else{
			echo 'error: '.mysqli_error($conn);
		}
	}
	
?>
	<!DOCTYPE html>
		<html>
			<head>
				<title>Registration Page</title>
				<link rel="stylesheet"  href="css/stylee.css">
				
			</head>
			<body>
				<div class="topnav">
					<a href="<?php echo ROOT_URL; ?>">Home</a>
					<a href="<?php echo ROOT_URL; ?>addReg.php">Registrations</a>
					
				</div>
				<div class="container">
					<h1>Add Registrations</h1>
					<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
						<div class="form-group">
							<p><label>name</label></p>
							<input type="text" name="name" class="form-control">
						</div>
						<div class="form-group">
							<p><label>email</label></p>
							<input type="text" name="email" class="form-control">
						</div>
						<div class="form-group">
							<p><label>phone</label></p>
							<input type="text" name="phone" class="form-control">
						</div>
						<div class="form-group">
							<p><label>branch</label></p>
							<input type="text" name="branch" class="form-control">
						</div>
						<input type="submit" name="submit" value="submit" class="btn btn-primary">
					</form>
					
				</div>
			<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
					 crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
			</body>
		</html>