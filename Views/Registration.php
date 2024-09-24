<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="css/cssRegi.css">
    <script src="js/ValidRegi.js"></script>
</head>
<body>
    <div class="registration-container">
        <h2>Registration</h2>
        <form action="../Controllers/RegistrationAction.php" method="POST" onsubmit="return Valid(this)" novalidate>
            <div class="input-group">
                <label for="name"> Name</label>
                <input type="text" name="name" id="name">
                <span class="error-message" id="err1"></span>
                <span class="error-message"><?php echo empty($_SESSION['err1'])? " ": $_SESSION['err1']?></span>
            </div>

            <div class="gender">
                <label for="role">Role</label>
                <input type="radio" name="role" id="user" value="User" onclick="toggleLocationInput()">
                <label for="user">User</label>
                <input type="radio" name="role" id="management" value="Management" onclick="toggleLocationInput()">
                <label for="management">Management</label>
            </div>
    			<span class="error-message" id="err2"></span>
                <span class="error-message"><?php echo empty($_SESSION['err2'])? " ": $_SESSION['err2']?></span>

                <div id="locationInput" style="display: none;">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location">
                    <span class="error-message" id="err2"></span>
                    <span class="error-message"><?php echo empty($_SESSION['err3'])? " ": $_SESSION['err3']?></span>
                </div>

            <script>
            function toggleLocationInput() {
                const managementRadio = document.getElementById('management');
                const locationInput = document.getElementById('locationInput');
                
                if (managementRadio.checked) {
                    locationInput.style.display = 'block';
                } else {
                    locationInput.style.display = 'none';
                }
            }
            </script>

            <div class="input-group">
                <label for="cnum">Contact Number</label>
                <input type="text" name="cnum" id="cnum">
                <span class="error-message" id="err3"></span>
                <span class="error-message"><?php echo empty($_SESSION['err4'])? " ": $_SESSION['err4']?></span>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email">
                <span class="error-message" id="err4"></span>
                <span class="error-message"><?php echo empty($_SESSION['err5'])? " ": $_SESSION['err5']?></span>
                <span class="error-message"><?php echo empty($_SESSION['err6'])? " ": $_SESSION['err6']?></span>
                
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span class="error-message" id="err5"></span>
                <span class="error-message"><?php echo empty($_SESSION['err7'])? " ": $_SESSION['err7']?></span> 
                <span class="error-message"><?php echo empty($_SESSION['err10'])? " ": $_SESSION['err10']?></span>
            </div>

            <div class="input-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword">
                <span class="error-message" id="err6"></span>
                <span class="error-message" id="err7"></span>
                <span class="error-message"><?php echo empty($_SESSION['err8'])? " ": $_SESSION['err8']?></span>
                <span class="error-message"><?php echo empty($_SESSION['err9'])? " ": $_SESSION['err9']?></span>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
		<div class="log-in">
		<a href="Login.php">Back to Login</a>
		</div>
		<span class="error-message"><?php echo empty($_SESSION['err11'])? " ": $_SESSION['err11']?></span>
		<span class="error-message"><?php echo empty($_SESSION['err12'])? " ": $_SESSION['err12']?></span>
    </div>
</body>
</html>
