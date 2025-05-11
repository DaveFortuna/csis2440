<?php
 session_start();
 include_once ('includes/functions.php');
 include_once('includes/db.php');
 if (!isGranted()) header("Location: .");
 if (isset($_POST['update']))
 {
  for ($x = 0; $x < sizeof($_SESSION['qty']); $x++)
  {
    $postID = 'qty-'.$x;
    if ($_POST[$postID] != ""){
      $newqty = intval($_POST[$postID]);
      if ($newqty == 0){
        
        unset($_SESSION['product-id'][$x]);
        unset($_SESSION['qty'][$x]);
        unset($_SESSION['product-name'][$x]);
        unset($_SESSION['price'][$x]);

      }else {$_SESSION['qty'][$x] = $newqty;}
  }
 }}
 error_reporting(-1);
 ini_set( 'display_errors', 1 );
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <link rel="stylesheet" type="text/css" href="css/cart.css">
  <script src="js/script.js" defer></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
</head>

<body>
  <?php
echo navBar();
echo '<div class="headline"><h1>Shopping Cart</h1></div>';

if (!empty($_SESSION['product-id'])){
  echo '<div class="cart">';
  echo '<form method="POST">';
    for ( $x = 0; $x < sizeof($_SESSION['product-id']); $x++)
    {
      echo printCartItem($x);
    }
  echo '<input class="update" name="update" type="submit" value="Update Cart">';
  echo '</form>';
  echo '</div>';
  echo printSideBar();
}else 
{
  echo printEmptyCart();
  echo printSuggestion();
}

// echo '<div class="dump">';
// echo var_dump($_SESSION['product-id']);
// echo var_dump($_SESSION['qty']);
// echo var_dump($_SESSION['product-name']);
// echo var_dump($_SESSION['price']);
// echo '</div>'
  ?>

</body>

</html>