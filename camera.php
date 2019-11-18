<?php
  require_once 'functions/session.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styling.css"/>
    </head>
    <body>
    <?php include 'includes/header.php'; ?>
        <div class="camera">
            <div>
            <video id="video" width="400" height="300"></video>
            <img id="photo" class="photo" src="" alt="Photo"/>
            <ul><li><img id = "thumb1" src="img/albion.png" width="50" height="50"/>
            </li><li><img id = "thumb2" src="img/chelsea.png" width="50" height="50"/>
            </li><li><img id = "thumb3" src="img/crystalpalace.png" width="50" height="50"/>
            </li><li><img id = "thumb4" src="img/liverpool.png" width="50" height="50"/>
            </li><li><img id = "thumb5" src="img/manu.png" width="50" height="50"/>
            </li><li><img id = "thumb6" src="img/sunderland.png" width="50" height="50"/>
            </li>
            </ul>

            </div>
            <a href="#" id="capture" class="ccb">Take Photo</a>
            <canvas id="canvas" style="display: none"width="400" height="300"></canvas>
            
        
        </div>
        <h1>Click here to see your <a href='gallery.php'>gallery</a></h1>
        <?php
        include_once 'config/setup.php';
        $img_dir = "img_gallery/";
        $images = scandir($img_dir);
        $html = "";
        try {
          $con = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
              $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
              $sql = "USE ".$DB_NAME;
                      $sql = "SELECT * FROM pictures_table";
                      $stmt = $con->prepare($sql);
                      $stmt->execute();
                      $res = $stmt->fetch();
        $html = "<ul id = 'taken-pics'>";
        foreach($images as $img) 	
        { 
          if($img=== '.' || $img === '..') 
          {
            continue;
          } 		   
          if (preg_match('/.png/',$img) )
          {				
            $html .="<li>
            <div style = '  width : 100%;
            height : 120;  display : inline-block;
            z-index : 10;
            padding-right : 2%;
            border : 1px solid #f5f7f6;
            border-radius : 5px;
            margin-top : 1%;
            margin-bottom : 2%;
            box-shadow : 0px 9px 8px 0px darkgrey;'>
            <img style='  width : 200;
            height : 120;
            z-index : 10;
            display : inline-block;
            float : left;
            border-right : 1px solid #f5f7f6;' src='".$img_dir.$img."'/>
            <form action = 'delete.php' method = 'post'>
            <input type = 'hidden' name = 'delete' value = '$img'/>
            <input type = 'hidden' name = 'img_id' value = '".$res['photo_id']."'/>
            <input type = 'submit' name = 'del' value = 'Delete'/>
            </form>
            </div>
            </li>";
          
          } 
          else 
          { 
            continue; 
          }	
        } 
        $html .="</ul>" ; 
        echo $html;
      }catch(PDOException $e)
      {
          echo $stmt . "<br>" . $e->getMessage();
      }
      ?>
        <script src="js/photo.js"></script>
        <div class="footer">
          <p><a href="logout.php">LOGOUT</a></p>
        </div>

    </body>
</html>

<?PHP
?>