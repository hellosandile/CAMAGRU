
Source code from my comment php which as a templete


<?PHP

include_once 'config/setup.php';
include_once 'functions/session.php';

if(isset($_POST['like'])){
        $userid = $_SESSION['user_id'];
        $img_id = $_POST['img_id'];
        $comment = $_POST['image_text'];
        try{
          
            $con = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
				$sql = "USE ".$DB_NAME;
                $sql = "INSERT INTO comments ( user_id, photo_id, comment)
                VALUES (:user_id, :photo_id, :comment)";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':user_id', $userid);
                $stmt->bindParam(':photo_id', $img_id);
                $stmt->bindParam(':comment', $comment);
                $stmt->execute();
            //header("location:/camagru/gallery.php");
            if ($stmt->rowCount())
            {
                echo "comment added";
            }
            else
            {
                echo "error". $userid. "^^^^^".$img_id.$comment;
            }
        }catch(PDOException $e){
            $result = "<p>An error occured".$e->getMessage()."</p>";
        }
}
?>