
<?php

require 'database.php';

try {
    $conn = new PDO("mysql:host=$DB_DSN", $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS camagru";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

try {
    $conn = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("use camagru");

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS users (
    `user_id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `Username` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255),
    `Passwrd` VARCHAR(255) NOT NULL,
    `Verified` INT(1) NOT NULL DEFAULT 0,
    `VeriCode` VARCHAR(10000) NOT NULL
    )";

    $conn->exec($sql);
    echo "Table users created successfully<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


try {
    $conn = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("use camagru");
    
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS pictures_table (
    `photo_id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `image` VARCHAR(200) NOT NULL,
    `text` TEXT(200)
    /*'user_id' INT FOREIGN KEY REFERENCES users(user_id)*/
    )";
    
        $conn->exec($sql);
        echo "Table pictures_table created successfully<br>";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
//$conn = null;

?>