<?PHP

include_once 'config/setup.php';
include_once 'functions/session.php';

if(isset($_POST['delete'])){
    $path = 'img_gallery/'.$_POST['delete'];
    if(is_file($path)){
        unlink($path);
        $imagename = $_POST['delete'];
        $userid = $_SESSION['user_id'];
        try{
            $query = "DELETE FROM pictures_table WHERE image = :imagename";
            $statement = $conn->prepare($query);
            $statement->bindParam(':imagename', $imagename);
            $statement->execute();
            if ($statement->rowCount())
            {
                echo 'deleted';
            }
            else
            {
                echo "error". $userid. "^^^^^".$imagename;
            }
        //    header("location: camera.php");
        }catch(PDOException $ex){
            $result = "<p>An error occured".$ex->getMessage()."</p>";
        }
    }
}
?>