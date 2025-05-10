<?php
 session_start();
 include_once ('includes/functions.php');
 include_once('includes/db.php');

 error_reporting(-1);
 ini_set( 'display_errors', 1 );
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <link rel="stylesheet" type="text/css" href="css/product.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product</title>
</head>

<body>
  <?php
    echo navBar();
    echo printProduct($_GET['id']);
  ?>
</body>

</html>