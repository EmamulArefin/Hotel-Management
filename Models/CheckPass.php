<?php 
session_start();

		$conn= mysqli_connect("localhost","root","","my_firstweb");
		
		if(!$conn){
			die("connection failed" .mysqli_connect_error());
			}
        
        $email=$_SESSION['email'];
        $pass= $_POST['oldpassword'];
        
		$sql = "SELECT Password from mid_final where Email = '$email'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
			// Return the user data
            $userData = mysqli_fetch_assoc($result);
			if($pass!==$userData['Password'])
            {
                echo "matched";
            }
        }
        
?>