<?php 

function matchdata($email, $password)
	{
		$conn= mysqli_connect("localhost","root","","final_project");
		
		if(!$conn){
			die("connection failed" .mysqli_connect_error());
			}

		$sql = "SELECT role,name,password from user where email = '$email'";
		$sql2 ="SELECT role,name,password from management where email='$email'";
		$result = mysqli_query($conn,$sql);
		$result2 = mysqli_query($conn,$sql2);

		if (mysqli_num_rows($result) > 0) {
			// Fetch the user's data
			$userData = mysqli_fetch_assoc($result);
			
			// Return the user data
			return $userData;}
		
		if (mysqli_num_rows($result2) > 0) {
				// Fetch the user's data
				$userData = mysqli_fetch_assoc($result2);
				// Return the user data
				return $userData;}
		else {
		return false;
		}
	}
?>