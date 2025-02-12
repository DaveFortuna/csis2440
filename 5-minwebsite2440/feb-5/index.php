<!doctype HTML>
<html lan="en">
  <head>
    <style rel="stylesheet" type="text/css" href="css/style.css"></style>
    <script src="js/script.js"></script>
    <title>Yo</title>
  </head>
  <body>
    <h1>YESSAH</h1>
    <?php 
    $person = array("first" => "beavis","last" => "jones");
  
    foreach ($person as $key => $guy) 
    {
      echo '<h4>'.$key.$guy.'</h4>';
    }
    ?>
    <form>
      <input>
      <input>  
    </form>
  </body>
</html>

