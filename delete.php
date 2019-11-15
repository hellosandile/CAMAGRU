<?PHP

include_once 'config/setup.php';
include_once 'functions/session.php';

if(isset($_POST['delete'])){
    $path = 'img_gallery/'.$_POST['delete'];
    if(is_file($path)){
        unlink($path);
        $imagename = $_POST['delete'];
        $userid = $_SESSION['user_id'];
        $img_id = $_POST['img_id'];
        try{
          
            $query = "DELETE FROM pictures_table WHERE photo_id = :imagename";
            $statement = $conn->prepare($query);
            $statement->bindParam(':imagename', $img_id);
            $statement->execute();
            header("location:/camagru/camera.php");
            if ($statement->rowCount())
            {
                echo 'deleted';
            }
            else
            {
                echo "error". $userid. "^^^^^".$imagename;
            }
        }catch(PDOException $e){
            $result = "<p>An error occured".$e->getMessage()."</p>";
        }
    }
}
?>