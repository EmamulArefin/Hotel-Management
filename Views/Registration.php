<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="css/cssRegi.css">
    <script src="js/ValidRegi.js"></script>
    <style>
        /* Style for the role selection */
        .role-selection {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .role-selection label {
            margin-right: 10px;
        }

        .role-option {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h2>Registration</h2>
        <form action="../Controllers/RegistrationAction.php" method="POST" onsubmit="return Valid(this)" novalidate>
            <div class="input-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name">
                <span class="error-message" id="err1"></span>
            </div>

            <div class="gender">
                <label for="gender">Gender</label>
                <input type="radio" name="gender" id="male" value="Male">
                <label for="male">Male</label>
                <input type="radio" name="gender" id="female" value="Female">
                <label for="female">Female</label>
            </div>
            <span class="error-message" id="err2"></span>

            <div class="input-group">
                <label for="cnum">Contact Number</label>
                <input type="text" name="cnum" id="cnum">
                <span class="error-message" id="err3"></span>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email">
                <span class="error-message" id="err4"></span>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span class="error-message" id="err5"></span>
            </div>

            <div class="input-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword">
                <span class="error-message" id="err6"></span>
                <span class="error-message" id="err7"></span>
            </div>

            <!-- Role Selection with better alignment -->
            <div class="role-selection">
            <div class="role-option">
                <input type="radio" name="role" id="user" value="User">
                <label for="user">User</label>
            </div>
            <div class="role-option">
                <input type="radio" name="role" id="manager" value="Manager">
                <label for="manager">Manager</label>
            </div>
        </div>
        <span class="error-message" id="err8"></span> <!-- Role error message -->

            <button type="submit" class="btn">Register</button>
        </form>

        <div class="log-in">
            <a href="Login.php">Back to Login</a>
        </div>

        <!-- Display error messages from the session -->
        <span class="error-message"><?php echo empty($_SESSION['err1']) ? " " : $_SESSION['err1']; ?></span>
        <span class="error-message"><?php echo empty($_SESSION['err2']) ? " " : $_SESSION['err2']; ?></span>
    </div>
</body>
</html>
