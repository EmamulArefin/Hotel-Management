<?php 
session_start();
require '../Models/userI.php';

$_SESSION['err1']="";
$_SESSION['err2']="";
$_SESSION['err3']="";
$_SESSION['err4']="";
$_SESSION['err5']="";
$_SESSION['err6']="";
$_SESSION['err7']="";
$_SESSION['err8']="";
$_SESSION['err9']="";
$_SESSION['email']="";

$isValid = true;
$name = sanitize($_POST['name']);
$gender = sanitize($_POST['gender']);
$cnum = sanitize($_POST['cnum']);
$email	= sanitize($_POST['email']);
$password = sanitize($_POST['password']);
$cpassword = sanitize($_POST['cpassword']);

	if(empty($email)){
	//$_SESSION['err1']="Please Provide Registerd Email";
	$isValid= false;
	}
	else
	{ $_SESSION['email']=$email;}

	if(empty($password)){
	//$_SESSION['err2']="Please Provide Password!!";
	$isValid= false;
	}

	if(empty($cpassword)){
	//$_SESSION['err3']="Please Provide Confirm Password!!";
	$isValid= false;
	}
	
	if($password !== $cpassword){
	//$_SESSION['err4']="Password Not Macthed!!";
	$isValid= false;
	}

	/*if(strlen($password)<8){
	//$_SESSION['err5']="Password cant not be less than 8 characters";
	$isValid= false;
	}*/
	if($isValid === true)
	{
	 $result =checkUser($name,$gender,$cnum,$email,$password);
	if($result === true)
	{
	$_SESSION['err1']="Registration Successfull.....Let's Nacho"; 
	header("location: ../Views/Registration.php");}
	else
	{ $_SESSION['err2']="Registration Failed!!!!";
	header("location: ../Views/Registration.php");
	}
	}
	else{
	header("location:../Views/Registration.php");}

	function sanitize($data){
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripslashes($data);

	return $data;
	}
?>