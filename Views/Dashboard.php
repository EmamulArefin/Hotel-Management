<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/cssDash.css">
</head>
<body>

    <!-- Header Section -->
    <div class="header">Dashboard</div>

    <!-- Main Content -->
    <div class="container">
        <!-- Left Menu with Links -->
        <div class="left-menu">
            <a href="#" id="View">View</a>
            <a href="#" id="Update-Name">Update Name</a>
            <a href="#" id="Update-Password">Change Password</a>
            <a href="../Controllers/Logout.php">Logout</a>
        </div>

        <!-- Right Content Section -->
        <div class="content">
            <div id="info">
            <script>
                
    // This ensures the script runs when the window (page) loads
        window.onload = function() {
            document.getElementById('info').innerHTML = "<iframe src='CustomerView.php' title='Update Name'></iframe>";
            }
            </script>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        Copyright 2024
    </div>

    <!-- JavaScript to Handle Click Events -->
    <script>
        document.getElementById('Update-Name').addEventListener('click', function() {
            document.getElementById('info').innerHTML = "<iframe src='UpdateName.php' title='Update Name'></iframe>";
        });

        document.getElementById('Update-Password').addEventListener('click', function() {
            document.getElementById('info').innerHTML = "<iframe src='ChangePass.php' title='Change Password'></iframe>";
        });

        document.getElementById('View').addEventListener('click', function() {
            document.getElementById('info').innerHTML = "<iframe src='CustomerView.php' title='Update Name'></iframe>";
        });
    </script>

</body>
</html>
