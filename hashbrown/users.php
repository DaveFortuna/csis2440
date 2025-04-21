<?php
  session_start();
  include_once ('includes/functions.php');
  include_once('includes/db.php');
  if(!isGranted()) header('location: .');

  error_reporting(-1);
  ini_set( 'display_errors', 1 );
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users</title>
</head>

<body style="background-image: <?php echo background();  ?> ;">
  <?php
    if (isGranted()) showNav();
  ?>
  <main class="main users">
    <?php
      echo printUsers();
      ?>
  </main>
</body>

</html>