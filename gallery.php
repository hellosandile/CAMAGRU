<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="styling.css"/>
</head>
<body>
  <header>
<?php include 'includes/header.php' ?>
</header>
<div>
<?php
require 'config/database.php';
ob_start();
include 'camera.php';
ob_end_clean();

echo $html;

?>
</div>
<div class="footer">
<?php include 'includes/footer.php' ?>
</div>
</body>

</html>