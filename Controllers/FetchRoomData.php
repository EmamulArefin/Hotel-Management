<?php
$conn = mysqli_connect("localhost", "root", "", "hotel");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch room data
$sql = "SELECT room_category, price, status FROM rooms";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . htmlspecialchars($row['room_category']) . "</td>
                <td>$" . htmlspecialchars($row['price']) . "</td>
                <td>" . htmlspecialchars($row['status']) . "</td>
                <td><button class='edit-btn' onclick=\"editRoom('" . htmlspecialchars($row['room_category']) . "')\">Edit</button></td>
            </tr>";
    }
}

mysqli_close($conn);
?>
