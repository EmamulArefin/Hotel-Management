<?php 

		$conn= mysqli_connect("localhost","root","","my_firstweb");
		
		if(!$conn){
			die("connection failed" .mysqli_connect_error());
			}

        $email=$_POST['email'];
        
		$sql = "SELECT * from mid_final where Email = '$email'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
			// Return the user data
			echo "exists";
        }
        
?>