<?php
if (!empty($_GET['error'])) $error = $_GET['error']; else $error = 0; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validation</title>
</head>

<body>
  <?php
    $pageForm .= '<div class="main">';
    if ($error==2){$pageForm .= '<div class="er2"><p>Nothing was entered. Try again.</p></div><br>';}
    if ($error==1){$pageForm .= '<div class="er1"><p>Only numbers can be entered in a 10 digit format.</p></div><br>';}
    $pageForm .= '<form action="process.php" method="POST">';
      $pageForm .=  '<div class="label"><label for="num">Enter your phone number:  <span id="ex"';
      if ($error==1) $pageForm .= ' style="background-color: chartreuse;"';
      $pageForm .= '>ex. (999)999-9999</span></label></div>';
      $pageForm .= '<div class="input"><input type="tel" id="num" name="num" value="'.$_GET['num'].'"></div><br>';
        $pageForm .= '<div class="buttons">';
        $pageForm .= '<input class="button" type="submit">';
        $pageForm .= '</div>';
        $pageForm .= '<div class="buttons">';
          $pageForm .= '<input class="button" type="reset">';
          $pageForm .= '</div>';
      $pageForm .= '</form>';
    $pageForm .= '</div>';
    echo $pageForm;
    ?>

</body>

</html>