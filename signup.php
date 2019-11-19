
<?php
    require('functions/session.php');
    require('config/database.php');
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
    try {
        //print_r($_POST);
        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']))
{

    $usern       = trim(htmlspecialchars($_POST['username']));
    $username       = preg_replace('/\s+/', '', $usern);
    $email          = trim(htmlspecialchars($_POST['email']));
    $pwd            = trim(htmlspecialchars($_POST['password']));

    $uppercase = preg_match('@[A-Z]@', $pwd);
    $lowercase = preg_match('@[a-z]@', $pwd);
    $number    = preg_match('@[0-9]@', $pwd);
    $specialChars = preg_match('@[^\w]@', $pwd);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pwd) < 8){
        header("location: signup.php?error=yes");
        die();
    }

            $con = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            
                $vericode = password_hash(rand(1, 9999999999), PASSWORD_BCRYPT);
                $hashpass = hash('md5',$pwd, FALSE);
				$con = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
				$sql = "USE ".$DB_NAME;
                $sql = "INSERT INTO users ( Username, email, Passwrd, VeriCode)
                VALUES (:username, :email, :pwd, :vericode)";
                $stmt = $con->prepare($sql);

                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':pwd', $hashpass);
                $stmt->bindParam(':vericode', $vericode);
                $stmt->execute();

                if($stmt->rowCount()){
                    mail($email, "Confirm email",
                    "http://localhost:8080/camagru/functions/verify.php?email=$email&vericode=$vericode", "Please click on link to verify your account then close window and login");
                    header("location: camera.php");
                }
}
    }
        catch(PDOException $e)
        {
            echo $stmt . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <link rel="stylesheet" href="styling.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Signup Page</title>
</head>
<body>
<?php include 'includes/header.php'; ?>
<h1>Sign Up</h1>
<form method = "post" action = "signup.php">
    <?php if(isset($_GET['error'])){
        echo 'Passowrd should be at least 8 characters in length and should include upper case letter, one number and one special character.';
    } ?>
    <table>
        <tr><td>Email:</td> <td><input type = "email" value = "" name = "email" required></td></tr>
        <tr><td>Username:</td> <td><input type = "text" value = "" name = "username" required></td></tr>
        <tr><td>Password:</td> <td><input type = "password" value = "" name = "password" required></td></tr>
        <tr><td></td><td><input style = "float: right;" type = "submit" value = "Sign Up" ></td></tr>
    </table>
    <p>Already have an account? <a href="login.php">Click Here</a> to login</p>
</form>
<div class="footer">
  <?php include 'includes/footer.php' ?>
</div>
</body>
</html>
