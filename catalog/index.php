<?php
 session_start();
 include_once ('includes/functions.php');
 include_once('includes/db.php');
 if (isset($_POST['submit'])) isLoginValid();

 error_reporting(-1);
 ini_set( 'display_errors', 1 );
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>

<body>
  <?php
  echo NavBar();
  if (isGranted()) LoggedIn();
  else if (empty($_POST)) LoginWForm();
  else {LoginWForm(); echo '<h1 class="invalid">Invalid login. Try again.</h1>';
  }
  ?>


</body>

</html>