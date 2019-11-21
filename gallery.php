<?php
  include 'functions/session.php';
  include_once 'config/database.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="styling.css"/>
</head>
<body>

<div>
<?php include 'includes/header.php' ?>
</div>
<br/>
<div id="content">
  <?php
    try {
          $con = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
              $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
              $sql = "USE ".$DB_NAME;
                      $sql = "SELECT * FROM pictures_table";
                      $stmt = $con->prepare($sql);
                      $stmt->execute();
                      //$res = $stmt->fetch();
        $html = "<ul id = 'taken-pics'>";
        $img_dir = "img_gallery/";
        //echo $res['image'];
        while( $res = $stmt->fetch()) 	
        { 
          $sql = "USE ".$DB_NAME;
                      $sql = "SELECT * FROM `comments` WHERE `user_id`= 8";
                      $st= $con->prepare($sql);
                      $st->execute();

          $img  = $res['image'];
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
            padding-right : 2%;'>
            <img style='  width : 200;
            height : 120;
            z-index : 10;
            display : inline-block;
            float : left;
            border-right : 1px solid #f5f7f6;' src='".$img_dir.$img."'/>
            
            <form action = 'comment.php' method = 'post'>
            <textarea 
      	id='text' 
      	cols='40' 
      	rows='4'
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
        </form>
        <form action = 'like.php' method = 'post'>
            <input type = 'hidden' name = 'img_id' value = '".$res['photo_id']."'/>
            <input type = 'submit' name = 'like' value = 'like'/>
            </form>


         "
            while($out = $st->fetchAll())
            {
              var_dump($out);
              echo $out['comment'];
            }
          "  
          </div>
            </div>
            <div>
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
  $con = null;
  ?>
  
</div>
<div class="footer">
        <?php include 'includes/footer.php' ?>
        </div>
</body>
</html>