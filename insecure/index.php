<?php
  error_reporting(-1);
  ini_set( 'display_errors', 1 );

  function printLogin() {
    echo '<div class="main" class="main" style="background-color: rgb(22,150,220, 0.8);">';
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

  if ($_SERVER['HTTP_HOST'] == 'localhost')
  {
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '1550');
    define('DB', 'users');
  }
  else
  {
    define('HOST', 'csis2440-dave-server.mysql.database.azure.com');
    define('USER', 'adhhylazkf');
    define('PASS', 'Chickenliver1!');
    define('DB', 'users');
  }

  function printInvalidLogin() {
    echo '<div class="main" style="background-color: rgb(22,150,220, 0.8);">';
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
    $u = ((isset($_POST['uname']) ? $_POST['uname'] : false));
		$p = ((isset($_POST['pword']) ? $_POST['pword'] : false));

    $conn = mysqli_connect(HOST,USER,PASS,DB);
    $sql = "select * from user where name='$u' and pass='$p';";
    $db = mysqli_query($conn, $sql);
    mysqli_close($conn);
    if(mysqli_num_rows($db)) return true; else return false;

}
  function outputFBI(){
    $stream = fopen('includes/fbi.txt','r');
    $contents = fread($stream, filesize('includes/fbi.txt'));
    $pairs = explode('||>><<||', $contents);
    
    $table = '<div class="main" style="background-color: rgb(50,205,50, 0.8);">';
    $table .= '<p>Access Granted</p>';
    $table .= '<div id="table">';
    $table .= '<table class="fbi">';
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
    $table.= '</table></div></div>';

    echo $table;
}
function background()
{
  if(isLoginValid()) $image = 'url(img/unlock.webp)';
  else $image = 'url(img/lock.jpg)';
  
  return $image;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insecure</title>
</head>

<body style="background-image: <?php echo background();  ?> ;">
  <main>
    <?php
        if (empty($_POST)) printLogin();
        elseif (isLoginValid()) outputFBI();
        else printInvalidLogin();
      ?>
  </main>
</body>

</html>



<?php
 
?>