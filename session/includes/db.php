<?php 
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

  function isLoginValid() {
    $u = ((isset($_POST['uname']) ? $_POST['uname'] : false));
    $p = ((isset($_POST['pword']) ? $_POST['pword'] : false));

    $conn = mysqli_connect(HOST,USER,PASS,DB);
    $sql = "select * from user where name='$u' and pass='$p';";
    $db = mysqli_query($conn, $sql);
    mysqli_close($conn);

    

    if(mysqli_num_rows($db)) 
    {
      $arr = mysqli_fetch_array($db, MYSQLI_ASSOC);
      $photo = $arr['photo'];
      $_SESSION['granted'] = true;
      $_SESSION['username'] = $u; 
      $_SESSION['photo'] = $photo; 
      return true;
    } else return false;

  }
?>