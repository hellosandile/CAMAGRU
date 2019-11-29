<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: darkred;
}

li {
  float: right;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

</style>
</head>
<body>

<ul>
  <li><a href="includes/logout.php">Logout</a></li>
  <li style="float:left;"><a href="index.php">Login</a></li>
  <li style="float:left;"><a href="signup.php">Sign Up</a></li>
</ul>

</body>
</html>