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
  <script src="js/script.js" defer></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account</title>
</head>

<body>
  <?php
echo navBar();
echo '<h1>Create New User Account</h1>';
if (empty($_POST)) 
        echo newUser();
      else if ($_POST['createusername'] == '' || $_POST['createpassword'] == '' || $_POST['createpassword2'] == '') 
      echo '<p class="message">All fields are required.</p>'.newUser(); 
    else if ($_POST['createpassword'] !== $_POST['createpassword2'])
      echo '<p class="message">Passwords do not match.</p>'.newUser();
    else if (checkDBForUserName()) 
      echo '<p class="message">User already exists.</p>'.newUser();
    else {
      createUser();
      echo '<p class="message">New Account Successful!</p>';
      echo '<a style="color: hotpink;" href="index.php">Back to Login</a>';
    }
  ?>
  <div class="errorfield">
    <p id="errorfield"></p>
    <p id="errorfield2"></p>
    <p id="errorfield3"></p>
  </div>

</body>

</html>