<?PHP
include_once 'resource/db.php';

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    try{
        $sqlInsert = "INSERT INTO users (username, email, `password`, join_date)
                    VALUES (:username, :email, :`password`, :now()";

    $statement = $db->prepare($sqlInsert);
    $statement->execute(array(':username' => $username, ':email' => $email, ':password' => $password));
    
    if($statement->rowCount() == 1){
        $result = "<p>Registration successful</p>";
    }

    }catch (PDOException $ex){
        $result = "<p>An error has occured: ".$ex->getMessage()."</p>";
    }
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h2>User Authentication System </h2><hr>
</html>

<h3>Registration form</h3>

<?PHP 
var_dump($_POST);

if(isset($result)) echo $result; ?>

<form method="post" action="">
    <table>
        <tr><td>email:</td> <td><input type="text" value="" name="email"></td></tr>
        <tr><td>Username:</td> <td><input type="text" value="" name="username"></td></tr>
        <tr><td>Password:</td> <td><input type="password" value="" name="password"></td></tr>
        <tr><td></td> <td><input style="float: right" type="submit" value="Sign up"></td></tr>
    </table>

</form>
<p><a href="index.php">Back</a> </p>
</body>
</html>