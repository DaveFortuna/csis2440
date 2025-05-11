<?php
 session_start();
 include_once ('includes/functions.php');
 include_once('includes/db.php');
 if (!isGranted()) header("Location: .");
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <link rel="stylesheet" type="text/css" href="css/checkout.css">
  <script src="js/script.js" defer></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
</head>

<body>
  <?php
  echo navBar();
  echo checkout($x);
 // clearCart();

?>







</body>

</html>