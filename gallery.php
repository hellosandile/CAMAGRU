<?php
include 'functions/session.php';
include_once 'config/database.php';
 

//--- SET THE VARIABLEA 
// try {
//     $con = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
//         $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
//         $sql = "USE ".$DB_NAME;
//                 $sql = "SELECT * FROM pictures_table WHERE user_id = 8";
//                 $stmt = $con->prepare($sql);
//                 $stmt->bindParam(1, $_GET['user_id']);
//                 $stmt->execute();
 

 
// $num = $stmt->rowCount();
 
// if( $num ){
//     $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
//     header("Content-type: image/png");
//     print $row['data'];
//     exit;
// }else{
//     echo "nothing";
// }}catch(PDOException $e)
// {
//     echo $stmt . "<br>" . $e->getMessage();
// }
// $con = null;
?>

<html>
<head>

</head>
<body>
<div id="content">
<?php
    try {
        $con = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $sql = "USE ".$DB_NAME;
                    $sql = "SELECT * FROM pictures_table ORDER BY photo_id DESC";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
      while( $res = $stmt->fetch()){
          echo "<div id='img_div'>";
          echo "<img src='img_gallery/".$res['image']."'>";
          echo "</div>";
      }
    }catch(PDOException $e)
    {
        echo $stmt . "<br>" . $e->getMessage();
    }
?>
</div>
</body>
</html>