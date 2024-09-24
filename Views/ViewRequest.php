<?php 
session_start();
require_once('../Models/FetchRequests.php'); // Include the model file

// Fetching request data using the model function
$requests = fetchRequests();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Request</title>
    <link rel="stylesheet" href="css/cssDash.css"> <!-- Ensure this path is correct -->
    <style>
        /* Enhanced table styling */
        .request-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .request-table th, .request-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .request-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .request-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .request-table tr:hover {
            background-color: #f1f1f1;
        }

        .action-btn, .status-btn {
            padding: 8px 12px;
            border-radius: 5px;
            color: white;
            border: none;
            cursor: pointer;
        }

        .action-btn {
            background-color: #4CAF50;
        }

        .action-btn.reject {
            background-color: #f44336;
        }

        .status-btn {
            background-color: #2196F3;
        }

        .action-btn:hover, .status-btn:hover {
            opacity: 0.8;
        }

        textarea {
            resize: none;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .loading {
            display: none;
            color: blue;
        }
    </style>
</head>
<body>

    <div class="header">View Requests</div>

    <div class="container">
        <div class="request-container">
            <h2>Customer Requests</h2>
            <table class="request-table">
                <tr>
                    <th>Customer Name</th>
                    <th>Room Category</th>
                    <th>Rent</th>
                    <th>Duration</th>
                    <th>Days</th>
                    <th>Customer Feedback</th>
                    <th>Manager Feedback</th> <!-- New column -->
                    <th>Actions</th>
                </tr>
                <?php if (!empty($requests)): ?>
                    <?php foreach ($requests as $request): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($request['customer_name']); ?></td>
                        <td><?php echo htmlspecialchars($request['room_category']); ?></td>
                        <td>$<?php echo htmlspecialchars($request['rent']); ?></td>
                        <td>
                            Start: <?php echo htmlspecialchars($request['start_date']); ?><br>
                            End: <?php echo htmlspecialchars($request['end_date']); ?>
                        </td>
                        <td><?php echo htmlspecialchars($request['stay_duration']); ?></td>
                        <td>
                            <textarea rows="3" cols="30" placeholder="Customer feedback..." readonly><?php echo htmlspecialchars($request['customer_feedback']); ?></textarea>
                        </td>
                        <td>
                            <textarea rows="3" cols="30" placeholder="Manager feedback..." readonly><?php echo htmlspecialchars($request['manager_feedback']); ?></textarea>
                        </td>
                        <td>
                            <div id="action-buttons-<?php echo $request['request_id']; ?>">
                                <?php if ($request['status'] === 'Pending'): ?>
                                    <button class="action-btn" onclick="updateRequestStatus(<?php echo $request['request_id']; ?>, 'Accepted')">Accept</button>
                                    <button class="action-btn reject" onclick="updateRequestStatus(<?php echo $request['request_id']; ?>, 'Rejected')">Reject</button>
                                <?php else: ?>
                                    <button class="status-btn"><?php echo htmlspecialchars($request['status']); ?></button>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="8">No requests available.</td></tr>
                <?php endif; ?>
            </table>
            <div class="loading" id="loading">Updating...</div>
        </div>
    </div>

    <div class="footer"></div>

    <script>
        function updateRequestStatus(requestId, status) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "UpdateRequestStatus.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            // Show loading state
            document.getElementById('loading').style.display = 'block';

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    document.getElementById('loading').style.display = 'none'; // Hide loading state

                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            alert('Request ' + requestId + ' status updated to ' + status + '!');
                            document.getElementById('action-buttons-' + requestId).innerHTML = '<button class="status-btn">' + status + '</button>';
                        } else {
                            alert('Error: ' + response.message);
                        }
                    } else {
                        alert('Error: Unable to communicate with the server. Please try again later.');
                    }
                }
            };
            xhr.send("request_id=" + requestId + "&status=" + status);
        }
    </script>

</body>
</html>