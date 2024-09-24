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
$_SESSION['err10']="";
$_SESSION['err11']="";
$_SESSION['err12']="";
$_SESSION['email']="";
$_SESSION['role']="";

$isValid = true;
$name = sanitize($_POST['name']);
$role = sanitize($_POST['role']);
$location = sanitize($_POST['location']);
$cnum = sanitize($_POST['cnum']);
$email	= sanitize($_POST['email']);
$password = sanitize($_POST['password']);
$cpassword = sanitize($_POST['cpassword']);

if(empty($name)){
	$_SESSION['err1']="Please Provide Name";
	$isValid= false;
	}

if(empty($role)){
		$_SESSION['err2']="Please Select your role";
		$isValid= false;
		}
		else
		{ $_SESSION['role']=$role;}

if(empty($location)){
			$_SESSION['err3']="Please Provide Location!!";
			$isValid= false;
			}

if(empty($cnum)){
				$_SESSION['err4']="Please Provide a valid contact number";
				$isValid= false;
				}

if(empty($email)){
	$_SESSION['err5']="Please Provide a valid Email";
	$isValid= false;
	}
	else
	{ $_SESSION['email']=$email;}

if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {

	} else {
		$_SESSION['err6'] = "Invalid email address";
	}
	

	if(empty($password)){
	$_SESSION['err7']="Please Provide Password!!";
	$isValid= false;
	}

	if(empty($cpassword)){
	$_SESSION['err8']="Please Provide Confirm Password!!";
	$isValid= false;
	}
	
	if($password !== $cpassword){
	$_SESSION['err9']="Password Not Macthed!!";
	$isValid= false;
	}

	if(strlen($password)<6){
	$_SESSION['err10']="Password cant not be less than 6 characters";
	$isValid= false;
	}
	if($isValid === true)
	{
	 $result =checkUser($role,$name,$location,$cnum,$email,$password);
	if($result === true)
	{
	$_SESSION['err11']="Registration Successfull.....Let's Nacho"; 
	header("location: ../Views/Registration.php");}
	else
	{ $_SESSION['err12']="Registration Failed!!!!";
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