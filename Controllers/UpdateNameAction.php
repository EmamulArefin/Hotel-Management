<?php 
session_start();

require '../Models/userI.php';

$_SESSION['err1']="";
$_SESSION['err2']="";
$_SESSION['err3']="";
$_SESSION['name']="";


$email = $_SESSION['email']; //to store session variable;

$isValid= true;
$name= sanitize($_POST['newname']);

	if(empty($name)){
	$isValid= false;
	}

	if($isValid === true)
	{
	//$result = updateName($name,$email);
    //if($result===true){
    //$_SESSION['err1']="Name Successfully Updated";
	header("location: ../Views/UpdateName.php");
    }
	/*else
	{ //$_SESSION['err2']="Failed to Upload In database";
	header("location: ../Views/UpdateName.php");
	}*/
	else{
		header("location: ../Views/UpdateName.php");}

function sanitize($data){
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripslashes($data);

	return $data;
	}
?>