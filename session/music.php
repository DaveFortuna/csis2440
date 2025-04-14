<?php
  session_start();
	include ('includes/functions.php');
  if(!isGranted()) header('location: .');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Music Video</title>
</head>

<body class="background">
  <?php
    if (isGranted()) showNav();
  ?>

  <div class="mv">
    <iframe width="560" height="315"
      src="https://www.youtube.com/embed/2WG8VrXo9Nc?si=7TI2PoElZ1r_h3v0"
      title="YouTube video player" frameborder="0"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
      referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </div>


</body>

</html>