
<?php
    session_start();
    require('config/database.php');

    try {
        //print_r($_POST);
        if (!empty($_POST['username']) || !empty($_POST['email']) || !empty($_POST['pwd']))
{

    $username       = trim(htmlspecialchars($_POST['username']));
    $email          = trim(htmlspecialchars($_POST['email']));
    $pwd            = trim(htmlspecialchars($_POST['pwd']));

            $con = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            
                $hashpass = password_hash($pwd, PASSWORD_BCRYPT);
				$con = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
				$sql = "USE ".$DB_NAME;
                $sql = "INSERT INTO users ( Username, email, Passwrd)
                VALUES (:username, :email, :pwd)";
                $stmt = $con->prepare($sql);

                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':pwd', $hashpass);
                $stmt->execute();
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
        <tr><td>Email:</td> <td><input type = "text" value = "" name = "email"></td></tr>
        <tr><td>Username:</td> <td><input type = "text" value = "" name = "username"></td></tr>
        <tr><td>Password:</td> <td><input type = "password" value = "" name = "password"></td></tr>
        <tr><td></td><td><input style = "float: right;" type = "submit" value = "Sign Up" ></td></tr>
    </table>
</form>
</body>
</html>

<?PHP

echo "rerere";
?>