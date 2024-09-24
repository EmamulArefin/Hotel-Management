<?php 
session_start();

require '../Models/UserI.php';

$_SESSION['err1']="";
$_SESSION['err2']="";
$_SESSION['err3']="";
$_SESSION['password']="";

$email = $_SESSION['email'];

$isValid= true;
$password= sanitize($_POST['newpass']);
$cpassword= sanitize($_POST['confpass']);

	if(empty($password)){
	$isValid= false;
	}

    if(empty($cpassword)){
        $isValid= false;
    }

    if($cpassword !== $password){
        $isValid= false;
    }


	if($isValid === true)
	{
	$result = updatePass($password,$email);
    if($result===true){
    $_SESSION['err1']="Password Successfully Updated";
	header("location: ../Views/ChangePass.php");
    }
	else
	{ $_SESSION['err2']="Failed to Upload In database";
	header("location: ../Views/ChangePass.php");
	}}
	else{
		header("location: ../Views/ChangePass.php");}

function sanitize($data){
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripslashes($data);

	return $data;
	}
?>