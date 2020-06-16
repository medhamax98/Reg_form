<?php
	require('confign/config.php');
	require('confign/dbconn.php');
	
	$query = 'SELECT * FROM form ORDER BY name';
	
	$result=mysqli_query($conn,$query);
	
	$dat1=mysqli_fetch_all($result, MYSQLI_ASSOC);
	
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
				<link rel="stylesheet"  href="css/stylee.css">
				
			</head>
			<body>
				<div class="topnav">
				  <a class="active" href="<?php echo ROOT_URL; ?>">Home</a>
				  <a href="<?php echo ROOT_URL; ?>addReg.php">Registrations</a></div>
				<div class="container">
					<h2>Registrations</h2>
					<?php foreach($dat1 as $dat2): ?>
						<div class ="well">
							<h3><?php echo $dat2['name']; ?></h3>
							<small><?php echo $dat2['email']; ?></small>
							<p>Ph No: <?php echo $dat2['phone']; ?> and working in <?php echo $dat2['branch']; ?> department</p>
							<a class="btn btn-default" href="<?php echo ROOT_URL; ?>select_one.php?id=<?php echo $dat2['id'];?>">Read more</a>
						</div>
					<?php endforeach; ?>
				</div>
			<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
					 crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
			</body>
		</html>
				
	