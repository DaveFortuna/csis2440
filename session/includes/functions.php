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
      $nav .= '<li><a href="logout.php"> Logout</a></li>';
      $nav .= '</ul>';
      $nav .= '</div>';
      echo $nav;
    }
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
    if(isLoginValid() || isGranted()) $image = 'url(img/unlock.webp)';
    else $image = 'url(img/lock.jpg)';
    
    return $image;
  }
	?>