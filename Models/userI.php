<?php 

function checkUser($name, $gender, $cnum, $email, $password) {
    $conn = mysqli_connect("localhost", "root", "", "hotel"); // Updated database name
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO users (`name`, gender, `contact_number`, email, `password`) VALUES ('$name', '$gender', '$cnum', '$email', '$password')";
    $result = mysqli_query($conn, $sql);

    return $result === true;
}

function updateName($name, $email) {
    $conn = mysqli_connect("localhost", "root", "", "hotel"); // Updated database name
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE users SET name = '$name' WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    return $result === true;
}

function updatePass($password, $email) {
    $conn = mysqli_connect("localhost", "root", "", "hotel"); // Updated database name
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE users SET password = '$password' WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    return $result === true;
}

// Process the AJAX request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rs = updateName($name, $email);
    if ($rs === true) {
        echo "success";
    } else {
        echo "failure";
    }
}
?>
