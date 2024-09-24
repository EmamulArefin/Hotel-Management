<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/external.css">
	<script src="js/Valid.js"></script>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="../Controllers/LoginAction.php" method="POST" onsubmit="return Valid(this)" novalidate>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email">
				<span id="err1"></span>
                <span><?php echo empty($_SESSION['err1'])? " ": $_SESSION['err1']?></span>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
				<span id="err2"></span>
                <span><?php echo empty($_SESSION['err2'])? " ": $_SESSION['err2']?></span>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
		<div class="signup">
		<label>Don't have any account? 	</label>
		<a href="Registration.php">Sign Up</a>
		</div>
		<span><?php echo empty($_SESSION['err3'])? " ": $_SESSION['err3']?></span>
    </div>
</body>
</html>
