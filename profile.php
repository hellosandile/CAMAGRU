<?php
include 'functions/session.php';
include_once 'config/database.php';
if(!isset($_SESSION['user_id'])){
    header("location: login.php");
  } 
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset = "UTF-8">
    <link rel="stylesheet" href="styling.css"/>
    <title>Profile</title>
</head>
<body>
<?php include 'includes/header.php'?>
<h1>Welcome to your profile. You can change stuff here :)</h1>
<form method = "post" action = "changeusername.php">
    <table>
        <tr><td></td><td><input style = "float: right;" type = "submit" value = "Change username" ></td></tr>
    </table>
</form>
<form method = "post" action = "changeemail.php">
    <table>
        <tr><td></td><td><input style = "float: right;" type = "submit" value = "Change email" ></td></tr>
    </table>
</form>
<form method = "post" action = "changepassword.php">
    <table>
        <tr><td></td><td><input style = "float: right;" type = "submit" value = "Change Password" ></td></tr>
    </table>
</form>
<h1>Click here to see your <a href='gallery.php'>gallery</a></h1>
<h1>Click here to take <a href='camera.php'>pictures</a></h1>
<div class="footer">
<?php include 'includes/footer.php' ?>
</div>
</body>
</html>