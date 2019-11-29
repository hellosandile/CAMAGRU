<?php
include 'functions/session.php';
include_once 'config/database.php';
 
?>

<html>
<head>
    <link rel="stylesheet" href="styling.css"/>
</head>
<body>
<?php include 'includes/header.php' ?>
<div id="content">
<?php
    try {

        $con = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $photoid = $_GET['id'];
            $sql = "USE ".$DB_NAME;
                    $sql = "SELECT * FROM pictures_table WHERE photo_id = $photoid ";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();

                    $res = $stmt->fetch();
          echo "<div id='img_div'>";
          echo "<img src='img_gallery/".$res['image']."'>
          <form action = 'comment.php' method = 'post'>
          <textarea 
            id='text' 
            cols='40' 
            rows='2'
            name='image_text' 
        placeholder='Add a comment...'></textarea>
            <div style='  width : 200;
                        height : 120;
                        z-index : 10;
                        display : inline-block;
                        border-right : 1px solid darkgrey;'></div>
      <br/>     
                <input type = 'hidden' name = 'img_id' value = '".$res['photo_id']."'/>
                <input type = 'submit' name = 'comment' value = 'comment'/>
            </form>";
          echo "</div>";
        
    }catch(PDOException $e)
    {
        echo $stmt . "<br>" . $e->getMessage();
    }
?>
</div>
    <div class="footer">
        <?php include 'includes/footer.php' ?>
        </div>
</body>
</html>