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
    $p = passTheSalt($p, $u);

    $conn = mysqli_connect(HOST,USER,PASS,DB);
    $sql = "select * from secureusers where name='$u' and pass='$p';";
    $db = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if(mysqli_num_rows($db)) 
    {
      $arr = mysqli_fetch_array($db, MYSQLI_ASSOC);
      $photo = $arr['photo'];
      $logins = $arr['logins'] + 1;
      $_SESSION['granted'] = true;
      $_SESSION['username'] = $u; 
      $_SESSION['photo'] = $photo; 
      $_SESSION['logins'] = $logins;

      $conn = mysqli_connect(HOST,USER,PASS,DB);
      $sql = "update secureusers set logins='$logins' where name='$u';";
      $db = mysqli_query($conn, $sql);
      mysqli_close($conn);

      return true;
    } else return false;

  }
  function checkDBForUserName(){
    $u = ((isset($_POST['username']) ? $_POST['username'] : false));

    $conn = mysqli_connect(HOST,USER,PASS,DB);
    $sql = "select * from secureusers where name='$u';";
    $db = mysqli_query($conn, $sql);
    mysqli_close($conn);
    
    return (mysqli_num_rows($db) > 0);
  }
  function createUser(){
    $u = ((isset($_POST['username']) ? $_POST['username'] : false));
    $p = ((isset($_POST['pass']) ? $_POST['pass'] : false));
    $p = passTheSalt($p, $u);

    $conn = mysqli_connect(HOST,USER,PASS,DB);
    $sql = "insert into secureusers (name, pass, logins, photo) values ('$u', '$p', 0, 'img/default.jpg');";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
  }

  function printUsers(){
    $conn = mysqli_connect(HOST,USER,PASS,DB);
    $sql = "select * from secureusers;";
    $db = mysqli_query($conn, $sql);
    mysqli_close($conn);

    $result = '';
    
    while ($row = mysqli_fetch_array($db, MYSQLI_ASSOC)){
     $result .= '<p> '.$row['name'].' </p>';
     $result .= '<p> '.$row['pass'].' </p>';
    }

    return ($result);
  }
?>