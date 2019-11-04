<?php
require('config/database.php');

    if (isset($_POST['upload'])) {
    
    try {
        $con = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $target = "img_gallery/".basename($_FILES['image']['name']);
        $image = $_FILES['image']['name'];
        $sql = "INSERT INTO pictures_table (`image`) VALUES ('$image')";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        echo "Picture uploaded<br>";
        }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
        } 
    }


?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div id="content">
    <form method="post" action="">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <input type="submit" name="upload" value="Upload">
        </div>
    </form>
</div>
</body>
</html>