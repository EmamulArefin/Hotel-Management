<?php 
$conn = mysqli_connect("localhost", "root", "", "final_project");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM custom_view2";
$result = mysqli_query($conn, $sql);

$userData = [];  // Initialize as an empty array

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $userData[] = $row;  // Store each row in the $userData array
}
} 

mysqli_close($conn);
?>