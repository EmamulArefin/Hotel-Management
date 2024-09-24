<?php 
session_start();

require '../Models/FetchUser.php';

$_SESSION['err1'] = "";
$_SESSION['err2'] = "";
$_SESSION['err3'] = "";
$_SESSION['email'] = "";
$_SESSION['value'] = "";
$_SESSION['loggedIn'] = false;

$isValid = true;
$email = sanitize($_POST['email']);
$password = sanitize($_POST['password']);

if(empty($email)){
    $_SESSION['err1'] = "Please Provide Registered Email";
    $isValid = false;
} else {
    $_SESSION['email'] = $email;
}

if(empty($password)){
    $_SESSION['err2'] = "Please Provide Password";
    $isValid = false;
}

if($isValid) {
    $result = matchdata($email, $password);

    if ($result && $result['password'] === $password) {
        $_SESSION['value'] = $result['name'];
        $_SESSION['loggedIn'] = true;

        if ($result['role'] === "User") { 
            header("Location: ../Views/Dashboard.php");
            exit();
        } else if ($result['role'] === "Management") {
            header("Location: ../Views/ManagementDashboard.php");
            exit();
        }
    } else {
        $_SESSION['err3'] = "Invalid email or Password";
        header("Location: ../Views/Login.php");
        exit();
    }
} else {
    header("Location: ../Views/Login.php");
    exit();
}

function sanitize($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}
?>
