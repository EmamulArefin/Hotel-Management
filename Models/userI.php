<?php 
session_start();

function checkUser($name,$location,$cnum,$email, $password){
	
    $conn = mysqli_connect("localhost", "root", "", "final_project");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SESSION['role'] === "User") {
        $sql = "INSERT INTO user (role,name, contactnum, email, password) VALUES ('$role','$name', '$cnum', '$email', '$password')";
    } else {
        $sql = "INSERT INTO management (role,name, contactnum, location, email, password) VALUES ('$role','$name', '$cnum', '$location', '$email', '$password')";
    }

    $result = mysqli_query($conn, $sql);

    if ($result === true) {
        return true;
    } else {
        echo "Error: " . mysqli_error($conn); // Debugging
        return false;
    }
}

	function updateName($name,$email){
		$conn = mysqli_connect("localhost","root","","final_project");
		
		if(!$conn){
			die("connection failed" . mysqli_connect_error());
			}

		$sql ="UPDATE user SET name ='$name'  WHERE email='$email'";
		$result = mysqli_query($conn,$sql);

	if($result === true)
	{
	return true;
	}

	else {
	return false;
		}
	}

	function updatePass($password,$email){

		$conn = mysqli_connect("localhost","root","","final_project");
		
		if(!$conn){
			die("connection failed" . mysqli_connect_error());
			}

		$sql ="UPDATE user SET password ='$password'  WHERE email='$email'";
		$result = mysqli_query($conn,$sql);

	if($result === true)
	{
	return true;
	}

	else {
	return false;
		}
	}

	// Process the AJAX request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
		$rs=updateName($name, $email);
        if ($rs===true) {
            echo "success";
        } else {
            echo "failure";
        }
}

?>