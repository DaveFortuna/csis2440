<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TypeCasting&Form</title>
</head>

<body>


  <?php
$a = 5;
$b = 5.44;
$c = "hello";
$d = true;
$e = NULL;
$f = false;

$a = (string) $a;
$b = (int) $b;
$c = (array) $c;
$d = (bool) $d;
$e = (string) $e;
$f = (bool) $f;

//To verify the type of any object in PHP, use the var_dump() function:
echo '<p>'.var_dump($a).'</p>';
'<br>';
echo '<p>'.var_dump($b).'</p>';
'<br>';
echo '<p>'.var_dump($c).'</p>';
'<br>';
echo '<p>'.var_dump($d).'</p>';
'<br>';
echo '<p>'.var_dump($e).'</p>';
'<br>';
echo '<p>'.var_dump($f).'</p>';


?>



  <form>
    <?php
    for ($i = 0;$i < 5;$i++){
    echo '<input>';
    echo '<br>';
    echo '<br>';
    }
    echo '<input type="time">';
    echo '<br>';
    echo '<br>';
    echo '<input type="image">';
    echo '<br>';
    echo '<br>';
    echo '<button>DoesNothing</button>';
?>

  </form>

</body>

</html>