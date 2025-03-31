<?php
if ($_SERVER['HTTP_HOST'] == 'localhost')
{
  error_reporting(-1);
  ini_set( 'display_errors', 1 );
}
include_once('includes/db.php');
include_once('includes/functions.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/function.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Poll</title>
</head>

<body>
  <?php
      if(empty($_POST)) {
        echo printPoll();
      }
      else {
        writeToDB($_POST['opt']);
        echo printResults();
      }
    ?>
</body>

</html>