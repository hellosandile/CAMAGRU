<?php
require 'config/database.php';
ob_start();
include 'camera.php';
ob_end_clean();

echo $html;

?>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="styling.css"/>
</head>
<body>
<div class="footer">
  <p><a href="logout.php">LOGOUT</a></p>
</div>
</body>

</html>