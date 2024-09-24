<?php 
    require '../Models/CustomerViewDB.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | View</title>
    <link rel="stylesheet" href="css/Feedback.css">
    <script src=""></script>
</head>
<body>
   <h2>Hotel Information</h2> 
   <a href="sendFeedback.php">Send Feedback</a>
   <table border="1">
        <tr>
            <th>ID</th>
            <th>Hotel Name</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
        <?php if (!empty($userData)): ?>
            <?php foreach ($userData as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['location'] ?></td>
                <td>
                    <a href="CustomerView2.php">View</a>
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
