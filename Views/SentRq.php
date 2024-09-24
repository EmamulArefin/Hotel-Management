<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent | Request</title>
    <link rel="stylesheet" href="css/external.css">
	<script src="js/Valid.js"></script>
</head>
<body>
    <div class="login-container">
        <h2>Rent Request</h2>
        <form action="" method="POST" onsubmit="return Valid(this)" novalidate>
            <div class="input-group">
                <label for="sdate">Starting Date</label>
                <input type="date" id="sdate" name="sdate">
				<!--<span id="err2"></span>-->
                <span><?php echo empty($_SESSION['err2'])? " ": $_SESSION['err2']?></span>
            </div>

            <div class="input-group">
                <label for="edate">Ending Date</label>
                <input type="date" id="edate" name="edate">
				<!--<span id="err2"></span>-->
                <span><?php echo empty($_SESSION['err2'])? " ": $_SESSION['err2']?></span>
            </div>

            <div class="input-group"> 
                <label for="textbox">Special Recommendation</label>
                <textarea id="textbox" name="textbox" rows="4" cols="30" placeholder="Enter your Recommendation..."></textarea>
                <span id="errTextBox"></span>
            </div>


            <button type="submit" class="btn">Sent Request</button>
        </form>
		</div>
		<span><?php echo empty($_SESSION['err3'])? " ": $_SESSION['err3']?></span>
    </div>
</body>
</html>
