<?php
function fetchRooms() {
    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "hotel");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetching room data
    $sql = "SELECT room_category, price, status FROM rooms";
    $result = mysqli_query($conn, $sql);
    $rooms = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rooms[] = $row; // Store each room in the $rooms array
        }
    }

    mysqli_close($conn); // Close the database connection
    return $rooms;
}
