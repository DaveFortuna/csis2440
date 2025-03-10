<?php
  error_reporting(-1);
  ini_set( 'display_errors', 1 );

  function printLogin() {
    echo '<div class="main">';
    echo '<p>Welcome</p>';
    echo '<form method="post">';
    echo '<div>';
    echo '<label for="uname">Username: </label>';
    echo '<input type="text" id="uname" name="uname">';
    echo '</div>';
    echo '<div>';
    echo '<label for="num">Password:</label>';
    echo '<input type="password" id="pword" name="pword">';
    echo '</div>';
    echo '<div class="buttons">';
    echo '<input class="button" id="submit" type="submit" value="Login">';
    echo '<input class="button" type="reset">';
    echo '</div>';
    echo '</form>';
    echo '</div>';
}
  function printChooseFile() {
    echo '<div class="main">';
    echo '<p>Access Granted</p>';
    echo '<div class="click" id="buttons">';
    echo '<p class="padded">Choose Your Data:</p>';
    echo '<button class="buttons" type="button" onclick="getFBI();">FBI</button>';
    echo '<button class="buttons" type="button" onclick="getSpies();">Spies</button>';
    echo '</div>';
    echo '<div id="table"></div>';
    echo '</div>';
  }
  function printInvalidLogin() {
    echo '<div class="main">';
    echo '<p>Access Denied</p>';
    echo '<form method="post">';
    echo '<div>';
    echo '<label for="uname">Username: </label>';
    echo '<input type="text" id="uname" name="uname">';
    echo '</div>';
    echo '<div>';
    echo '<label for="num">Password:</label>';
    echo '<input type="password" id="pword" name="pword">';
    echo '</div>';
    echo '<div class="buttons">';
    echo '<input class="button" id="submit" type="submit" value="Login">';
    echo '<input class="button" type="reset">';
    echo '</div>';
    echo '</form>';
    echo '</div>';
   
}
  function isLoginValid() {
    if((isset($_POST['uname']) && $_POST['uname'] == 'chuck') && (isset($_POST['pword']) && $_POST['pword'] == 'roast') || (isset($_POST['uname']) && $_POST['uname'] == 'bob') && (isset($_POST['pword']) && $_POST['pword'] == 'ross'))
      return true;
    else return false;
}
  function outputFBI(){
    $stream = fopen('includes/fbi.txt','r');
    $contents = fread($stream, filesize('includes/fbi.txt'));
    $pairs = explode('||>><<||', $contents);
    
    $table = '';
    $table = '<table class="fbi">';
    $table .= '<tr>';
    $table .= '<th>Agent</th>';
    $table .= '<th>Code Name</th>';
    $table .= '</tr>';
    foreach($pairs as $pair){
      $people = explode(',', $pair);
      $table .= '<tr>';
      for($x = 0;$x < sizeof($people); $x++) 
      {
        $table .='<td>'.ucwords($people[$x]).'</td>' ;
      } 
      $table .= '</tr>';
    }
    $table.= '</table>';

    return $table;
}
  function outputSpies(){
  $stream = fopen('includes/spies.txt','r');
  $contents = fread($stream, filesize('includes/spies.txt'));
  $pairs = explode('||>><<||', $contents);
  
  $table = '';
  $table = '<table class="spies">';
  $table .= '<tr>';
  $table .= '<th>Agent</th>';
  $table .= '<th>Code Name</th>';
  $table .= '</tr>';
  foreach($pairs as $pair){
    $people = explode(',', $pair);
    $table .= '<tr>';
    for($x = 0;$x < sizeof($people); $x++) 
    {
      $table .='<td>'.ucwords($people[$x]).'</td>' ;
    } 
    $table .= '</tr>';
  }
  $table.= '</table>';

  return $table;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script defer>
  function getFBI() {
    document.getElementById("table").innerHTML =
      <?php echo json_encode(outputFBI()); ?>;
    document.getElementById("buttons").innerHTML = "";
    document.getElementById("buttons").style.height = "0px";
    document.getElementById("headline").innerHTML = "FBI";
  }

  function getSpies() {
    document.getElementById("table").innerHTML =
      <?php echo json_encode(outputSpies()); ?>;
    document.getElementById("buttons").innerHTML = "";
    document.getElementById("headline").innerHTML = "Spies";
  }
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Spies Like Us</title>
</head>

<body>
  <main>
    <?php
        if (empty($_POST)) printLogin();
        elseif (isLoginValid()) printChooseFile();
        else printInvalidLogin();
      ?>
  </main>
</body>

</html>



<?php
 
?>