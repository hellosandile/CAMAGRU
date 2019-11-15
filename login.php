<?php
    include_once 'functions/session.php';
    include_once 'config/setup.php';
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $pasword = trim(htmlspecialchars($_POST['password']));
        $password = hash('md5',$pasword, FALSE);
        try{
            $query = "SELECT * FROM users WHERE Username = :username";
            $statement = $conn->prepare($query);
            $statement->bindParam(':username', $username);
            $statement->execute();
            if($statement->rowCount() == 1){
                $row = $statement->fetch();
                $username = $row['Username'];
                $id = $row['user_id'];
                $hashed_password = $row['Passwrd'];
                $verified = $row['Verified'];
                if($verified == 1){
                    if($password == $hashed_password){
                        $_SESSION['user_id'] = $id;
                        header("location: camera.php");
                    }else{
                        //$result = "$password.<br />$hashed_password";
                    }
                }
            }
        }catch(PDOException $ex){
            $result = "<p>An error occured".$ex->getMessage()."</p>";
        }
    }
?>
<html>
    <head>
    <link rel="stylesheet" href="styling.css"/>
    </head>
    <body>
        <div>
            <div class="row">
                <div>
                    <h1>Login</h1>
                    <?php if(isset($result)) echo $result; ?>
                    <form method="post" action="">
                        <div>
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" placeholder="Enter username" required>
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter Password" required>
                        </div>
                        <input type="submit" value="Log In" name="login">
                        <p>Forgot Password <a href="changepassword.php">Click Here</a></p>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer">
            <p><a href="logout.php"></a></p>
        </div>
    </body>
</html>