<?php
session_start();

// Enable error reporting for debugging (Remove this in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = mysqli_connect("localhost", "root", "", "hotel");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the request_id and status from the POST data
    $request_id = isset($_POST['request_id']) ? intval($_POST['request_id']) : 0;
    $status = isset($_POST['status']) ? trim(mysqli_real_escape_string($conn, $_POST['status'])) : '';

    // Validate inputs
    if ($request_id > 0 && !empty($status)) {
        // Prepare the SQL statement to prevent SQL injection
        $sql = "UPDATE requests SET status = ? WHERE request_id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, 'si', $status, $request_id);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                // Check if any rows were updated
                if (mysqli_stmt_affected_rows($stmt) > 0) {
                    // Return a success message
                    header('Content-Type: application/json');
                    echo json_encode(["success" => true, "message" => "Request status updated successfully."]);
                } else {
                    // Return an error message if no rows were affected (i.e., invalid request_id)
                    header('Content-Type: application/json');
                    echo json_encode(["success" => false, "message" => "No request found with the given ID."]);
                }
            } else {
                // Return an error message for execution failure
                header('Content-Type: application/json');
                echo json_encode(["success" => false, "message" => "Error executing the query: " . mysqli_error($conn)]);
            }
            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            // Return an error message for statement preparation failure
            header('Content-Type: application/json');
            echo json_encode(["success" => false, "message" => "Error preparing the query: " . mysqli_error($conn)]);
        }
    } else {
        // Return an invalid data error message
        header('Content-Type: application/json');
        echo json_encode(["success" => false, "message" => "Invalid request data."]);
    }
} else {
    // Return an invalid request method error message
    header('Content-Type: application/json');
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}

// Close the database connection
mysqli_close($conn);
?>
