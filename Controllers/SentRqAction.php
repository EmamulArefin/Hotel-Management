<?php 
session_start();

require '../Models/FetchRequests.php';

$_SESSION['err1'] = "";
$_SESSION['err2'] = "";
$_SESSION['err3'] = "";
$_SESSION['email'] = "";
$_SESSION['value'] = "";
$_SESSION['loggedIn'] = false;

$isValid = true;
$sdate = sanitize($_POST['sdate']);
$edate = sanitize($_POST['edate']);
$comment = $_POST['textbox'];

if(empty($sdate)){
    $_SESSION['err1'] = "Please Provide Starting date";
    $isValid = false;
} else {
    $_SESSION['email'] = $email;
}

if(empty($edate)){
    $_SESSION['err2'] = "Please Provide Ending date";
    $isValid = false;
}

if($isValid) {
    $result = enterdata($sdate, $edate);
    $result2 = entercomment($comment);
    if($result===true && $result2 ===true){
        $_SESSION['err3'] = "Request sent Successfully"; 
        header("Location: ../Views/SentRq.php");
    }
    else{
        $_SESSION['err3'] = "Unable to sent request"; 
        header("Location: ../Views/SentRq.php");
    }

} else {
    header("Location: ../Views/SentRq.php");
    exit();
}

function sanitize($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}
?>
