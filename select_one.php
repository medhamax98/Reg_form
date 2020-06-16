<?php
	require('confign/config.php');
	require('confign/dbconn.php');
	
	if(isset($_POST['delete'])){
		//get data from form
		$delete_id= mysqli_real_escape_string($conn,$_POST['delete_id']);
		$name= mysqli_real_escape_string($conn,$_POST['name']);
		$email= mysqli_real_escape_string($conn,$_POST['email']);
		$phone= mysqli_real_escape_string($conn,$_POST['phone']);
		$branch= mysqli_real_escape_string($conn,$_POST['branch']);

		$query = "DELETE FROM form WHERE id={$delete_id}";
		
		if(mysqli_query($conn,$query)){
			header('Location: '.ROOT_URL.'');
		}
		else{
			echo 'error: '.mysqli_error($conn);
		}
	}

	//get id
	$id=mysqli_real_escape_string($conn, $_GET['id']);
	
	$query = "SELECT * FROM form where id =".$id;
	$result=mysqli_query($conn,$query);
	
	$dat2 = mysqli_fetch_ASSOC($result);
	
	//var_dump($dat);
	
	//Free result from memory:
	mysqli_free_result($result);
	
	//connection termination
	mysqli_close($conn);
	
?>
	<!DOCTYPE html>
		<html>
			<head>
				<title>Registration Page</title>
				<link rel="stylesheet"  type="text/css" href="css/stylee.css">
				
			</head>
			<body>
				<div class="topnav">
				  <a class="active" href="<?php echo ROOT_URL; ?>">Home</a>
				  <a href="<?php echo ROOT_URL; ?>addReg.php">Registrations</a>
				</div>
				<div class="container">
					<a href="<?php echo ROOT_URL; ?>" class="btn btn-default">Back</a>
					<h1><?php echo $dat2['name']; ?></h1>
					<small><?php echo $dat2['email']; ?></small>
					<p>Ph No: <?php echo $dat2['phone']; ?> and working in <?php echo $dat2['branch']; ?> department</p>	
					<hr>
					<form class="pull right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<input type="hidden" name="delete_id" value="<?php echo $dat2['id']; ?>">
						<input type="submit" name="delete" value="Delete" class="btn btn-danger">
					</form>
					<a href="<?php echo ROOT_URL; ?>editform.php?id=<?php echo $dat2['id']; ?>" class="btn btn-default">Edit</a>
				</div>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
			</body>
		</html>
				
	