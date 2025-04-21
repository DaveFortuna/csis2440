<?php
session_start();
  function isGranted()
    {
      if(isset($_SESSION['granted'])) return true;
      
      return false;
  }
    function showNav() {
      $nav = '<div class="nav">';
      $nav .= '<ul class="">';
      $nav .= '<li><a href="index.php"> Home</a></li>';
      $nav .= '<li><a href="music.php"> Secret Video</a></li>';
      $nav .= '<li><a href="user.php"> User Info</a></li>';
      $nav .= '<li><a href="users.php"> Users</a></li>';
      $nav .= '<li><a href="logout.php"> Logout</a></li>';
      $nav .= '</ul>';
      $nav .= '</div>';
      echo $nav;
  }
    function printLogin() {
      echo '<div class="main" style="background-color: rgb(22,150,220, 0.8);">';
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
      echo '<div>';
      echo '<input class="button" id="submit" type="submit" value="Login">';
      echo '<input class="button" type="reset">';
      echo '</div>';
      echo '<a style="color: orange;" href="create-account.php">Click to Create a Login</a>';
      echo '<input type="hidden" value="2" name="triesRemaining">';
      echo '</form>';
      echo '</div>';
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
      echo '<a style="color: orange;" href="create-account.php">Click to Create a Login</a>';
      echo '<input type="hidden" value="'.($_POST['triesRemaining'] - 1) .'" name="triesRemaining">';
      echo '</form>';
      echo '</div>';
     
  }
  function printAccountLocked() {
    echo '<div class="main" style="background-color: rgb(22,150,220, 0.8);">';
    echo '<p>Access Denied</p>';
    echo '<p class="message">Too many invalid logins. Account Locked!</p>';
    echo '</div>';
   
}
    function outputFBI(){
      $stream = fopen('includes/fbi.txt','r');
      $contents = fread($stream, filesize('includes/fbi.txt'));
      $pairs = explode('||>><<||', $contents);
      
      $table = '<div class="main" style="background-color: rgb(50,205,50, 0.8);">';
      $table .= '<p>Access Granted</p>';
      $table .= '<p>'.ucwords($_SESSION['username']).' has logged in '.$_SESSION['logins'].' time';
       if ($_SESSION['logins'] > 1) $table .= 's';
       $table .= '.</p>';
$table .= '<div id="table">';
  $table .= '<table class="fbi">';
    $table .= '<tr>';
      $table .= '<th>Agent</th>';
      $table .= '<th>Code Name</th>';
      $table .= '</tr>';
    foreach($pairs as $pair){
    $people = explode(',', $pair);
    $table .= '<tr>';
      for($x = 0;$x < sizeof($people); $x++) { $table .='<td>'
        .ucwords($people[$x]).'</td>' ;
        }
        $table .= '</tr>';
    }
    $table.= '</table>
</div>
</div>';

echo $table;
}
function background()
{
if(isLoginValid() || isGranted()) $image = 'url(img/unlock.webp)';
else $image = 'url(img/lock.jpg)';

return $image;
}
function passTheSalt($word, $user)
{
$s = '6545fvdszfsd';
$p = 'lt4yuk89m651';

$u = $s.$user.$p;
$u2= $s.$user.$p.$user;

$salt = hash('sha512',$u);
$saltier = hash('sha512',$u2);

$w = $salt.$word;
$w = $salt.$word.$saltier;
$w = hash('sha512', $w);

return $w;
}
function printNewAccount(){

$display = '<form method="post">';
  $display .= '<div>';
    $display .= '<label for="username">Enter Username:</label>';
    $display .= '<input name="username" id="username" type="text">';
    $display .= '</div>';
  $display .= '<div>';
    $display .= '<label for="pass">Enter Password:</label>';
    $display .= '<input name="pass" id="pass" type="password">';
    $display .= '</div>';
  $display .= '<div>';
    $display .= '<label for="passval">Re-enter Password:</label>';
    $display .= '<input name="passval" id="passval" type="password">';
    $display .= '</div>';
  $display .= '<div class="buttons">';
    $display .= '<input class="button button2" type="submit" value="Create">';
    $display .= '<input class="button button2" type="Reset">';
    $display .= '</div>';
  $display .= '<a style="color: hotpink;" href="index.php">Back to Login</a>';
  $display .= '</form>';

return $display;
}
?>