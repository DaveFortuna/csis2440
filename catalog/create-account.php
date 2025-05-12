<?php
  session_start();
  include_once ('includes/functions.php');
  include_once('includes/db.php');

  $error = false;
  if (isset($_POST['newuser'])) {
    if (!checkDBForUserName())
      createUser();
    else
      $error = true;
  }

  if (isGranted() && !isset($_POST['productID'])) 
    header("Location: .");
  
  if (isGranted() && isset($_POST['productID']))
    header("Location: product.php?id=".$_POST['productID']);
  
  error_reporting(-1);
  ini_set( 'display_errors', 1 );

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <script src="js/script.js" defer></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account</title>
</head>

<body>
  <?php
    echo navBar();
    echo '<h1>Create New User Account</h1>';
    if ($error) 
      echo '<p class="message">User already exists.</p>';
    echo newUser();

  ?>
  <div class="errorfield">
    <p id="errorfield">Please make sure both password fields are identical. </p>
    <p id="errorfield2">Password must be at least 8 characters long. </p>
    <p id="errorfield3">Password must include at least 1 number. </p>
  </div>

</body>

</html>