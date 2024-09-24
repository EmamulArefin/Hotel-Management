<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Info</title>
    <link rel="stylesheet" href="css/cssDash.css">
    <style>
        /* Style for the form */
        .form-container {
            width: 300px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header">Update Info</div>

    <!-- Main Content -->
    <div class="container">
        <div class="form-container">
            <form action="../Controllers/SaveUpdate.php" method="POST"> <!-- Corrected path -->
                <label for="roomCategory">Room Category</label>
                <input type="text" id="roomCategory" name="roomCategory" value="<?php echo htmlspecialchars($_GET['room']); ?>" readonly>

                <label for="roomPrice">Room Rent</label>
                <input type="text" id="roomPrice" name="roomPrice" required>

                <label for="roomStatus">Room Status</label>
                <select id="roomStatus" name="roomStatus" required>
                    <option value="Available">Available</option>
                    <option value="Not Available">Not Available</option>
                </select>

                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        
    </div>

</body>
</html>
