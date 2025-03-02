<?php
if (!empty($_POST['num'])){
  if(!preg_match("/^[(]\d\d\d[)]\d\d\d[-]\d\d\d\d$/", $_POST['num'])) $error=1;
  if($error) header('location: index.php?error='.$error.'&num='.$_POST['num']);

  
  
}
else {
  $error =2;
  if($error) header('location: index.php?error='.$error);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style.css" type="text/css" rel="stylesheet">
  <title>Process</title>
</head>

<body>
  <?php
  echo '<div class="submission">';
  echo '<h1>Form succesfully submitted!! </h1><br>';
  echo '<p> Thank you for your submission. In no way will you be spammed with spam!</p><br>';
  echo '<p>Your number is:'.$_POST['num'].'</p>';



  echo '</div>';


?>

</body>

</html>