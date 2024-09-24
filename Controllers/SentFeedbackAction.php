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

$comment = sanitize( $_POST['textbox']);


if($isValid) {
    $result2 = entercomment($comment);
    if( $result2 ===true){
        $_SESSION['err3'] = "Request sent Successfully"; 
        header("Location: ../Views/SentFeedback.php");
    }
    else{
        $_SESSION['err3'] = "Unable to sent request"; 
        header("Location: ../Views/SentFeedback.php");
    }

} else {
    header("Location: ../Views/SentFeedback.php");
    exit();
}

function sanitize($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}
?>
