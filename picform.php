<?PHP
include_once 'functions/session.php';
include_once 'config/setup.php';

$filteredData=substr($_POST['base64'], strpos($_POST['base64'], ",") + 1);
$unencodedData = base64_decode($filteredData);
$naming = $_SESSION['user_id'].time().'.png';
if (!file_exists('img_gallery'))
    mkdir(img_gallery);
file_put_contents('img_gallery/'.$naming, $unencodedData);

function super_impose($src,$dest,$topimage)
{
    $cameraimage = imagecreatefrompng($src);
    $sticker = imagecreatefrompng($topimage);
    list($width, $height) = getimagesize($src);
    list($width_small, $height_small) = getimagesize($topimage);
    
    imagecopyresampled($cameraimage, $sticker,  0, 0, 0, 0, 50, 50, $width_small, $height_small);
    // Source Image, Overlay Image,x,y For placing the overlay image on center,0,0 and width and height for play button image
    //imagepng($image_1, "image_3.png");
    
    imagejpeg($cameraimage , $dest);
}
$name = $_POST['sticker'];
super_impose("img_gallery/".$naming,"img_gallery/".$naming,"img/".$name);

try {
    $con = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
				$sql = "USE ".$DB_NAME;
                $sql = "INSERT INTO pictures_table ( `image`, `user_id`)
                VALUES (:image, :text)";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':image', $naming);
                $stmt->bindParam(':text', $_SESSION['user_id']);
                $stmt->execute();
}catch(PDOException $e)
{
    echo  "<br>" . $e->getMessage();
}
$conn = null;

header("location:/camagru/camera.php");

?>