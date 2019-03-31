<?php 
	$time = $_POST['score'];
	$name = $_POST['name']; 
	$diff = $_POST['diff'];
	$con = mysqli_connect('localhost','root','********','leaderboard');
	if (!$con) {
		die('Could not connect: ' . mysqli_error($con));
	}
	$sql= "INSERT INTO ranking (time, name, difficulty) VALUES('".$time."','".$name."','".$diff."')";
	
	if (mysqli_query($con, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>