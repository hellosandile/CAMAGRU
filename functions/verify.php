<?php

require '../config/setup.php';

if(isset($_GET['email']) && isset($_GET['vericode'])) {
    $email = $_GET['email'];
    $vericode = $_GET['vericode'];

    try{
        $sql = "SELECT * FROM users WHERE email =:email AND VeriCode =:vericode";

        $statement = $conn->prepare($sql);
        $statement->execute(array(':email' => $email, ':vericode' => $vericode));

        if($statement->rowCount() == 1){

            $sqlUpdate = "UPDATE users SET Verified =:Passwrd WHERE email=:email AND VeriCode =:vericode";

            $statement = $conn->prepare($sqlUpdate);

            $statement->execute(array(':Passwrd' => 1, ':email' =>$email, ':vericode' => $vericode));

            $result = "<p>Account Verified</p>";
        }
        else{
            $result = $result = "<p>UNSUCCESSFUL</p>";

        }
    }catch (PDOException $e){
        $result = "<p>An error has occored</p>";
    }
}
?>