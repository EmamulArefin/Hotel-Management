<?php 
    require '../Models/CustomerViewDB2.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | View</title>
    <link rel="stylesheet" href="css/CustomerView.css">
    <script src=""></script>
</head>
<body>
   <h2>Hotel Information</h2> 
   <table border="1">
        <tr>
            <th>ID</th>
            <th>Room Details</th>
            <th>Rent</th>
            <th>Status</th>
            <th>Feedback</th>
            <th>Request for Room</th>
        </tr>
        <?php if (!empty($userData)): ?>
            <?php foreach ($userData as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['roomD'] ?></td>
                <td><?= $user['rent'] ?></td>
                <td><?= $user['Status'] ?></td>
                <td><?= $user['feedback'] ?></td>
                <td>
                    <a href="SentRq.php">Request for Room</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No data available</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
