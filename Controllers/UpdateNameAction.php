<?php 
session_start();

require '../Models/userI.php'; // Make sure this file contains your database connection function

$_SESSION['err1'] = "";
$_SESSION['err2'] = "";
$_SESSION['err3'] = "";
$_SESSION['name'] = "";

$email = $_SESSION['email']; // Store session variable
$isValid = true;
$name = sanitize($_POST['newname']);

if (empty($name)) {
    $isValid = false;
    $_SESSION['err1'] = "New name cannot be empty.";
}

if ($isValid) {
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "hotel"); // Adjust credentials as necessary

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the name in the users table
    $sql = "UPDATE users SET name = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $name, $email);

        if ($stmt->execute()) {
            $_SESSION['value'] = $name; // Update session variable
            $_SESSION['err1'] = "Name successfully updated.";
            header("Location: ../Views/Dashboard.php");
            exit;
        } else {
            $_SESSION['err2'] = "Failed to update the name: " . $stmt->error;
            header("Location: ../Views/UpdateName.php");
            exit;
        }

        $stmt->close();
    } else {
        $_SESSION['err2'] = "Failed to prepare statement: " . $conn->error;
        header("Location: ../Views/UpdateName.php");
        exit;
    }

    mysqli_close($conn);
} else {
    header("Location: ../Views/UpdateName.php");
    exit;
}

function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>
