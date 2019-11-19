<?php

require 'config/setup.php';

$email = $_POST['email'];
$password1 = $_POST['new_password'];
$password2 = $_POST['confirm_password'];

if($password1 != $password2){
    $result = "<p>New password and confirm password do not match</p>";
}else{
        try{
            $sql = "SELECT email FROM users WHERE email =:email";

            $statement = $conn->prepare($sql);
            $statement->execute(array(':email' => $email));

            if($statement->rowCount() == 1){
                $hashpass = password_hash($password1, PASSWORD_BCRYPT);

                $sqlUpdate = "UPDATE users SET Passwrd =:Passwrd WHERE email=:email ";

                $statement = $conn->prepare($sqlUpdate);

                $statement->execute(array(':Passwrd' => $hashpass, ':email' =>$email));

                $result = "<p>Rest successful</p>";
            }
            else{
                $result = $result = "<p>Rest UNSUCCESSFUL</p>";

            }
        }catch (PDOException $e){
            $result = "<p>An error has occored</p>";
        }
    }

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset = "UTF-8">
    <link rel="stylesheet" href="styling.css"/>
    <title>Password Reset</title>
</head>
<body>
<?php include 'includes/header.php'?>
<h1>Password Reset</h1>
<form method = "post" action = "changepassword.php">
    <table>
        <tr><td>Email:</td> <td><input type = "email" value = "" name = "email" required></td></tr>
        <tr><td>New Password:</td> <td><input type = "password" value = "" name = "new_password" required></td></tr>
        <tr><td>Confirm Password:</td> <td><input type = "password" value = "" name = "confirm_password" required></td></tr>
        <tr><td></td><td><input style = "float: right;" type = "submit" value = "Reset Password" ></td></tr>
    </table>
</form>
<div class="footer">
<?php include 'includes/footer.php' ?>
</div>
</body>
</html>