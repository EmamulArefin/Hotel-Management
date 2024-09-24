<?php 
session_start();
require_once '../Models/FetchUser.php';

$_SESSION['err1'] = "";
$_SESSION['err2'] = "";
$_SESSION['err3'] = "";
$_SESSION['email'] = "";
$_SESSION['value'] = "";
$_SESSION['loggedIn'] = false;

$isValid = true;
$email = sanitize($_POST['email']);
$password = sanitize($_POST['password']);

if (empty($email)) {
    $isValid = false;
} else {
    $_SESSION['email'] = $email;
}

if (empty($password)) {
    $isValid = false;
}

if ($isValid === true) {
    $_SESSION['loggedIn'] = true;
    $result = matchdata($email, $password);
    
    if ($result) {
        // Debugging output
        error_log(print_r($result, true));
        
        if ($result['Password'] === $password) { 
            $_SESSION['value'] = $result['Name'];
            header("location: ../Views/Dashboard.php");
            exit; // Always good to exit after redirecting
        }
    }
    
    $_SESSION['err3'] = "Invalid email or Password";
    header("location: ../Views/Login.php");
    exit;
} else {
    header("location: ../Views/Login.php");
    exit;
}

function sanitize($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}
