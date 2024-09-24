<?php
$conn = mysqli_connect("localhost", "root", "", "final_project");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];

$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "exists";
} else {
    echo "available";
}

mysqli_close($conn);
?>
