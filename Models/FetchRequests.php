<?php
function fetchRequests() {
    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "hotel");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetching requests data along with related customer, room, and manager feedback information
    $sql = "
        SELECT r.request_id, u.name AS customer_name, rm.room_category, 
               b.total_amount AS rent, b.start_date, b.end_date, 
               DATEDIFF(b.end_date, b.start_date) AS stay_duration, 
               r.feedback AS customer_feedback, r.status, r.manager_feedback
        FROM requests r
        JOIN users u ON r.customer_id = u.user_id
        JOIN rooms rm ON r.room_id = rm.room_id
        JOIN bookings b ON r.customer_id = b.customer_id AND r.room_id = b.room_id
    ";

    $result = mysqli_query($conn, $sql);
    $requests = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $requests[] = $row; // Store each request in the $requests array
        }
    }

    mysqli_close($conn); // Close the database connection
    return $requests;
}
?>
