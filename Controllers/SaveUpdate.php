<?php
session_start();
require_once '../Models/DBConnect.php'; // Import the DB connection

// Check if the form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $roomCategory = $_POST['roomCategory'];
    $roomPrice = $_POST['roomPrice'];
    $roomStatus = $_POST['roomStatus'];

    // Validate the inputs
    if (!empty($roomCategory) && !empty($roomPrice) && !empty($roomStatus)) {
        // Connect to the database
        $db = new DBConnect();
        $conn = $db->connect();

        // Update the room information in the database
        $sql = "UPDATE rooms SET price = :price, status = :status WHERE room_category = :roomCategory";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':price', $roomPrice);
        $stmt->bindParam(':status', $roomStatus);
        $stmt->bindParam(':roomCategory', $roomCategory);

        // Execute the query
        if ($stmt->execute()) {
            // If update is successful, return a success message
            echo "Room updated successfully!";
        } else {
            echo "Error updating record.";
        }
    } else {
        echo "All fields are required.";
    }
}
?>
