<?php
	//connection:
	$conn = mysqli_connect('localhost','root','Password321','phpForm');
	if(mysqli_connect_errno()){
		echo 'Failed in connecting with sql'. mysqli_connect_errno();
	}