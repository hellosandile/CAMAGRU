<?php

require 'config/setup.php';
include 'functions/session.php';

$username = $_POST['username'];
$newusername = $_POST['new_username'];

{
        try{
            $sql = "SELECT Username FROM users WHERE Username =:username";

            $statement = $conn->prepare($sql);
            $statement->execute(array(':username' => $username));

            if($statement->rowCount() == 1){

                $sqlUpdate = "UPDATE users SET Username =:new_username WHERE Username=:username ";

                $statement = $conn->prepare($sqlUpdate);

                $statement->execute(array(':new_username' => $newusername, ':username' =>$username));

                $result = "<p>Reset successful</p>";
                echo $result;
                header("location: includes.logout.php");
            }
            else{
                $result = $result = "<p>Username changed successfulL</p>";

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
    <title>Change Username</title>
</head>
<body>
<?php include 'includes/header.php'?>
<h1>Change Username</h1>
<form method = "post" action = "changeusername.php">
    <table>
        <tr><td>Username:</td> <td><input type = "text" value = "" name = "username" required></td></tr>
        <tr><td>New Username:</td> <td><input type = "text" value = "" name = "new_username" required></td></tr>
        <tr><td></td><td><input style = "float: right;" type = "submit" value = "Change Username" ></td></tr>
    </table>
</form>
<div class="footer">
<?php include 'includes/footer.php' ?>
</div>
</body>
</html>