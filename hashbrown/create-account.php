<?php
  session_start();
  include_once ('includes/functions.php');
  include_once('includes/db.php');
  if(isGranted()) header('location: .');

  error_reporting(-1);
  ini_set( 'display_errors', 1 );
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account</title>
</head>

<body class="background">
  <div class="main">
    <p>Create User Account</p>
    <?php
      if (empty($_POST)) 
        echo printNewAccount();
      else if ($_POST['username'] == '' || $_POST['pass'] == '' || $_POST['passval'] == '') 
      echo '<p class="message">All fields are required.</p>'.printNewAccount(); 
    else if ($_POST['pass'] !== $_POST['passval'])
      echo '<p class="message">Passwords do not match.</p>'.printNewAccount();
    else if (checkDBForUserName()) 
      echo '<p class="message">User already exists.</p>'.printNewAccount();
    else {
      createUser();
      echo '<p class="message">New Account Successful!</p>';
      echo '<a style="color: hotpink;" href="index.php">Back to Login</a>';
    }
    ?>

  </div>

</body>

</html>