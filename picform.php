<?PHP
$filteredData=substr($_POST['base64'], strpos($_POST['base64'], ",") + 1);
$unencodedData = base64_decode($filteredData);
file_put_contents('img_gallery/newpic.png', $unencodedData);
?>