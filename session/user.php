<?php
  session_start();
	include_once ('includes/functions.php');
  if(!isGranted()) header('location: .');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php	include_once('includes/db.php');?>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Details</title>
</head>

<body class="background">
  <?php
    if (isGranted()) showNav();
  ?>

  <div class="userinfo">

    <?php
  echo '<p>Hello '.ucfirst($_SESSION['username']).'</p>';
  echo '<img class="userpic" src="'.$_SESSION['photo'].'">';
  ?>

  </div>

</body>

</html>