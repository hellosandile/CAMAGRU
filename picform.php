<?PHP
$filteredData=substr($_POST['base64'], strpos($_POST['base64'], ",") + 1);
$unencodedData = base64_decode($filteredData);
$naming = hash('md5', rand(10, 10000), FALSE);
file_put_contents('img_gallery/'.$naming.'.png', $unencodedData);

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
super_impose("img_gallery/".$naming.".png","img_gallery/".$naming.".png","img/".$name);
header("location:/camagru/camera.php");

?>