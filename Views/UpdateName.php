<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Name</title>
    <link rel="stylesheet" href="css/external.css">
    <script src="js/UpName.js"></script>
</head>
<body>
    <div class="login-container">
        <h2>Update Name</h2>
        <form action="../Controllers/UpdateNameAction.php" method="POST" onsubmit="return Valid(this)" novalidate>
            <div class="input-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="<?php echo empty($_SESSION['value'])? "":$_SESSION['value'] ?>" readonly>
                <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
            </div>
            <div class="input-group">
                <label for="newname">Edited Name</label>
                <input type="text" id="newname" name="newname">
				<span id="err1"></span>
            </div>
            <button type="submit" class="btn">Update Name</button>
        </form>
        <span id="err2"></span>
        <!--<span><?php echo empty($_SESSION['err1'])? " ": $_SESSION['err1']?></span>
		<span><?php echo empty($_SESSION['err2'])? " ": $_SESSION['err2']?></span>-->
    </div>
</body>
</html>
