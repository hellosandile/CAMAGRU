<?php

require 'config/setup.php';
include 'functions/session.php';

$email = $_POST['email'];
$newemail = $_POST['new_email'];

{
        try{
            $sql = "SELECT email FROM users WHERE email =:email";

            $statement = $conn->prepare($sql);
            $statement->execute(array(':email' => $email));

            if($statement->rowCount() == 1){

                $sqlUpdate = "UPDATE users SET email =:newemail WHERE email=:email ";

                $statement = $conn->prepare($sqlUpdate);

                $statement->execute(array(':newemail' => $newemail, ':email' =>$email));

                $result = "<p>Reset successful</p>";
                echo $result;
                header("location: includes.logout.php");
            }
            else{
                $result = $result = "<p>Email reset successfulL</p>";

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
    <title>Change email</title>
</head>
<body>
<?php include 'includes/header.php'?>
<h1>Change Email</h1>
<form method = "post" action = "changeemail.php">
    <table>
        <tr><td>Email:</td> <td><input type = "email" value = "" name = "email" required></td></tr>
        <tr><td>New Email:</td> <td><input type = "email" value = "" name = "new_email" required></td></tr>
        <tr><td></td><td><input style = "float: right;" type = "submit" value = "Change email" ></td></tr>
    </table>
</form>
<div class="footer">
<?php include 'includes/footer.php' ?>
</div>
</body>
</html>