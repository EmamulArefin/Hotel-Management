<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="css/external.css">
    <script src="js/ChangePass.js"></script>
</head>
<body>
    <div class="login-container">
        <h2>Change Password</h2>
        <form action="../Controllers/ChangePassAction.php" method="POST" onsubmit="return Valid(this)" novalidate>
            <div class="input-group">
                <label for="oldpass">Current Password</label>
                <input type="password" id="oldpass" name="oldpass">
                <span  id="err1"></span>
            </div>
            <div class="input-group">
                <label for="newpass">New Password</label>
                <input type="password" id="newpass" name="newpass">
				<span id="err2"></span>
            </div>

            <div class="input-group">
                <label for="confpass">Confirm Password</label>
                <input type="password" id="confpass" name="confpass">
				<span id="err3"></span>
                <span id="err4"></span>
            </div>
            <button type="submit" class="btn">Update Password</button>
        </form>
        <span><?php echo empty($_SESSION['err1'])? " ": $_SESSION['err1']?></span>
		<span><?php echo empty($_SESSION['err2'])? " ": $_SESSION['err2']?></span>
    </div>
</body>
</html>
