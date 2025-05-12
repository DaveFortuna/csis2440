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

    $conn = new mysqli(HOST, USER, PASS, DB);
    $sql = "select * from users where username=? and password=?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param("ss", $u, $p);
    $statement->execute();
    
    $results = $statement->get_result();

    $statement->close();
	  $conn->close();

    if ($results->fetch_assoc()) {
      $_SESSION['granted'] = true;
      $_SESSION['username'] = $u; 
      return true;
    } else return false;
  }
  function checkDBForUserName(){
    $u = ((isset($_POST['createusername']) ? $_POST['createusername'] : false));

    $conn = new mysqli(HOST, USER, PASS, DB);
    $sql = "select * from users where username =?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param("s", $u);
    $statement->execute();
    
    $results = $statement->get_result();

    $statement->close();
	  $conn->close();

    return $results->fetch_assoc();
  }
  function getProductFromDB($id)
  {
    $conn = new mysqli(HOST, USER, PASS, DB);
    $sql = "SELECT * FROM product WHERE id =?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    
    $results = $statement->get_result();

    $statement->close();
	  $conn->close();

    return $results->fetch_assoc();
  }
  function createUser(){
    $u = ((isset($_POST['createusername']) ? $_POST['createusername'] : false));
    $p = ((isset($_POST['createpassword']) ? $_POST['createpassword'] : false));
    $p = passTheSalt($p, $u);

    $conn = new mysqli(HOST, USER, PASS, DB);
    $sql = "insert into users (username, password) values (?, ?);";
    $statement = $conn->prepare($sql);
    $statement->bind_param("ss", $u, $p);
    $statement->execute();
    
    $statement->close();
	  $conn->close();
    
    $_SESSION['granted'] = true;
    $_SESSION['username'] = $u; 
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