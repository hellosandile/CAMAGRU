
<?php
    require('functions/session.php');
    require('config/database.php');

    try {
        //print_r($_POST);
        if (!empty($_POST['username']) || !empty($_POST['email']) || !empty($_POST['password']))
{

    $username       = trim(htmlspecialchars($_POST['username']));
    $email          = trim(htmlspecialchars($_POST['email']));
    $pwd            = trim(htmlspecialchars($_POST['password']));

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
                    "http://localhost:8080/camagru/functions/verify.php?email=$email&vericode=$vericode", "sandile@wow.com");
                }
}
    }
        catch(PDOException $e)
        {
            echo $stmt . "<br>" . $e->getMessage();
        }
        $conn = null;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <title>Signup Page</title>
</head>
<body>
<h1>Sign Up</h1>
<form method = "post" action = "signup.php">
    <table>
        <tr><td>Email:</td> <td><input type = "email" value = "" name = "email" required></td></tr>
        <tr><td>Username:</td> <td><input type = "text" value = "" name = "username" required></td></tr>
        <tr><td>Password:</td> <td><input type = "password" value = "" name = "password" required></td></tr>
        <tr><td></td><td><input style = "float: right;" type = "submit" value = "Sign Up" ></td></tr>
    </table>
    <p>Already have an account <a href="login.php">Click Here</a></p>
</form>
</body>
</html>
