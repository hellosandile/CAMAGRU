<?php
    include_once 'functions/session.php';
    include_once 'config/setup.php';
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        try{
            $query = "SELECT * FROM users WHERE username = :username";
            $statement = $conn->prepare($query);
            $statement->bindParam(':username', $username);
            $statement->execute();
            if($statement->rowCount() == 1){
                $row = $statement->fetch();
                $username = $row['username'];
                $id = $row['user_id'];
                $hashed_password = $row['Passwrd'];
                $verified = $row['confirm'];
                if($verified == 1){
                    if(password_verify($password, $hashed_password)){
                        $_SESSION['id'] = $id;
                        header("location: camagru/camera.php");
                    }else{
                        $result = "<p style='color:red;'> Incorrect password or email</p>";
                    }
                }
            }
        }catch(PDOException $ex){
            $result = "<p style='color:red;'> An error occured".$ex->getMessage()."</p>";
        }
    }
?>
<html>
    <head>
    </head>
    <body>
        <div>
            <nav>
                <a >Camagru</a>
                <div>
                    <a  href="#">Login</a>
                    <a href="signup.php">Signup</a>
                </div>
            </nav>
        </div>
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
    </body>
</html>