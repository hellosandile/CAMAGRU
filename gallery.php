<?php


session_start();
//help debugg error messages
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config/database.php';
  
try {
    //create connection database
    $con = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    //Initialize message variable
    $msg = "";

    // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  $image_text = $_POST['image_text'];

  	// image file directory
	  $target = "img_gallery/".basename($image);
	//   echo $username = $_SESSION['Username'];

  	$sql = "INSERT INTO pictures_table (image,text)
		VALUES ('".$image."', '".$image_text."')";
		$stmt = $con->prepare($sql);
		$stmt->execute();
  	// execute query

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $con->prepare("SELECT * FROM pictures_table");
    $stmt->bindParam(':pictures_table', $images);
    $stmt->execute();
    $result = $stmt->fetch();
  //$result = mysqli_query($con, "SELECT * FROM images");
}
catch(PDOException $e)
{
	echo "connection failed: " . $e->getMessage();
}

?>


<!DOCTYPE html>
<html>
	
	<div id="content">
<?php
	$con = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $con->prepare("SELECT * FROM pictures_table");
	$stmt->bindParam(':pictures_table', $images);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$row = $result;
	//print_r($row);
	
	foreach ($result as $img):
		?>
		<div class="pic">
			  <div id='img_div'>
				<img src='img_gallery/<?=$img['image'];?>' >
				<p><?=$img['text'];?></p>
		  	</div>
	
		  <?php
		  endforeach;?>


  <form method="POST" action="gallery.php" enctype="multipart/form-data" >
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4"
      	name="image_text" 
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
	</div>
	</body>
</html>