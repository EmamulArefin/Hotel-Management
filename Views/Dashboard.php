<?php 
session_start();

// Include the model that fetches room data
include '../Models/FetchRooms.php';

// Fetching room data using the function from the model
$rooms = fetchRooms();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
    <link rel="stylesheet" href="css/cssDash.css">
    <style>
        /* Style for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        /* Style for Edit button */
        .edit-btn {
            background-color: #4CAF50; /* Green background */
            color: white; /* White text */
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .edit-btn:hover {
            background-color: #45a049; /* Darker green on hover */
        }
        /* Style for View Request button */
        .view-request-btn {
            float: right;
            background-color: #007BFF; /* Blue background */
            color: white; /* White text */
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }
        .view-request-btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header">Dashboard
        <button class="view-request-btn" onclick="viewRequest()">View Request</button>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Left Menu with Links -->
        <div class="left-menu">
            <a href="#" id="Home">Home</a>
            <a href="#" id="Profile">Profile</a>
            <a href="#" id="Update-Name">Update Name</a>
            <a href="#" id="Update-Password">Change Password</a>
            <a href="../Controllers/Logout.php">Logout</a>
        </div>

        <!-- Right Content Section -->
        <div class="content">
            <div id="info">
                <h2>Welcome! <?php echo isset($_SESSION['value']) ? htmlspecialchars($_SESSION['value']) : 'Guest'; ?></h2>

                <!-- Table of Room Information -->
                <table>
                    <tr>
                        <th>Room Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                    <?php if (!empty($rooms)): ?>
                    <?php foreach ($rooms as $room): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($room['room_category']); ?></td>
                        <td>$<?php echo htmlspecialchars($room['price']); ?></td>
                        <td><?php echo htmlspecialchars($room['status']); ?></td>
                        <td><button class="edit-btn" onclick="editRoom('<?php echo htmlspecialchars($room['room_category']); ?>')">Edit</button></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="4">No rooms available.</td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer"></div>

    <!-- JavaScript to Handle Click Events -->
    <script>
        document.getElementById('Home').addEventListener('click', function() {
            document.getElementById('info').innerHTML = `
                <h2>Welcome! <?php echo isset($_SESSION['value']) ? htmlspecialchars($_SESSION['value']) : 'Guest'; ?></h2>
                <table>
                    <tr>
                        <th>Room Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                    <?php foreach ($rooms as $room): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($room['room_category']); ?></td>
                        <td>$<?php echo htmlspecialchars($room['price']); ?></td>
                        <td><?php echo htmlspecialchars($room['status']); ?></td>
                        <td><button class="edit-btn" onclick="editRoom('<?php echo htmlspecialchars($room['room_category']); ?>')">Edit</button></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            `;
        });

        document.getElementById('Update-Name').addEventListener('click', function() {
            document.getElementById('info').innerHTML = "<iframe src='UpdateName.php' title='Update Name' style='width:100%; height:400px; border:none;'></iframe>";
        });

        document.getElementById('Update-Password').addEventListener('click', function() {
            document.getElementById('info').innerHTML = "<iframe src='ChangePass.php' title='Change Password' style='width:100%; height:400px; border:none;'></iframe>";
        });

        document.getElementById('Profile').addEventListener('click', function() {
            document.getElementById('info').innerHTML = "<h2>Welcome! <?php echo isset($_SESSION['value']) ? htmlspecialchars($_SESSION['value']) : 'Guest'; ?></h2>";
        });

        // JavaScript function to handle Edit button click
        function editRoom(roomCategory) {
            document.getElementById('info').innerHTML = "<iframe src='UpdateInfo.php?room=" + encodeURIComponent(roomCategory) + "' title='Update Info' style='width:100%; height:400px; border:none;'></iframe>";
        }

        // Function to handle View Request button click
        function viewRequest() {
            document.getElementById('info').innerHTML = "<iframe src='ViewRequest.php' title='View Request' style='width:100%; height:400px; border:none;'></iframe>";
        }
    </script>

</body>
</html>
