<?php
  if ($_SERVER['HTTP_HOST'] == 'localhost')
  {
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '1550');
    define('DB', 'universes');
  }
  else
  {
    define('HOST', 'csis2440-dave-server.mysql.database.azure.com');
    define('USER', 'adhhylazkf');
    define('PASS', 'Chickenliver1!');
    define('DB', 'universes');
  }
?>