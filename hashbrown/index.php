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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Session</title>
</head>

<body style="background-image: <?php echo background();  ?> ;">
  <?php
    if (isGranted()) showNav();
  ?>
  <main>
    <?php
        if (isGranted()) outputFBI();
        else if (empty($_POST)) printLogin();
        else if (isLoginValid()) outputFBI();
        else if ($_POST['triesRemaining'] == 0) printAccountLocked();
        else printInvalidLogin();
      ?>
  </main>
</body>

</html>