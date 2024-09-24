<?php

function matchdata($email, $password)
{
    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "hotel"); // Change to your database name

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT `Password`, `Name` FROM users WHERE email = ?");
    $stmt->bind_param("s", $email); // Bind the email parameter
    $stmt->execute(); // Execute the statement
    $result = $stmt->get_result(); // Get the result set

    if ($result->num_rows > 0) {
        // Fetch the user's data
        $userData = $result->fetch_assoc();
        
        // Close the statement and connection
        $stmt->close();
        $conn->close();

        // Return the user data
        return $userData;
    } else {
        // Close the statement and connection
        $stmt->close();
        $conn->close();
        
        return false; // No user found
    }
}
?>
