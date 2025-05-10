<?php 
  if ($_SERVER['HTTP_HOST'] == 'localhost')
  {
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '1550');
    define('DB', 'store');
  }
  else
  {
    define('HOST', 'csis2440-dave-server.mysql.database.azure.com');
    define('USER', 'adhhylazkf');
    define('PASS', 'Chickenliver1!');
    define('DB', 'store');
  }
  

  function isLoginValid() {
    $u = ((isset($_POST['username']) ? $_POST['username'] : false));
    $p = ((isset($_POST['password']) ? $_POST['password'] : false));
    $p = passTheSalt($p, $u);

    $conn = mysqli_connect(HOST,USER,PASS,DB);
    $sql = "select * from users where username='$u' and password='$p';";
    $db = mysqli_query($conn, $sql);
    mysqli_close($conn);

    

    if(mysqli_num_rows($db)) 
    {
      $arr = mysqli_fetch_array($db, MYSQLI_ASSOC);
      $_SESSION['granted'] = true;
      $_SESSION['username'] = $u; 
      return true;
    } else return false;

  }
  function checkDBForUserName(){
    $u = ((isset($_POST['createusername']) ? $_POST['createusername'] : false));

    $conn = mysqli_connect(HOST,USER,PASS,DB);
    $sql = "select * from users where username ='$u';";
    $db = mysqli_query($conn, $sql);
    mysqli_close($conn);
    
    return (mysqli_num_rows($db) > 0);
  }

  function getProductFromDB($id)
  {
    //CONNECT TO THE DATABASE
	$conn = mysqli_connect(HOST,USER,PASS,DB);
	
	//WRITE A DB QUERY
  $sql = "SELECT * FROM product WHERE id ='$id';";
	
	//RUN DB QUERY 
	$db = mysqli_query($conn, $sql);

  //close connection
  mysqli_close($conn);
  
	//RETURN THE DATA AS ASSOCIATIVE ARRAY
	return mysqli_fetch_array($db, MYSQLI_ASSOC);


  }

  function createUser(){
    $u = ((isset($_POST['createusername']) ? $_POST['createusername'] : false));
    $p = ((isset($_POST['createpassword']) ? $_POST['createpassword'] : false));
    $p = passTheSalt($p, $u);

    $conn = mysqli_connect(HOST,USER,PASS,DB);
    $sql = "insert into users (username, password) values ('$u', '$p');";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
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
?>