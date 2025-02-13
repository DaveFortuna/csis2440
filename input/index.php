<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/function.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Input</title>
</head>

<body>
  <main>
    <?php
        if(empty($_POST))
        {
          echo '<form method="post">';
          echo '<label for="fname">First name: </label><br>';
          echo '<input type="text" id="fname" name="fname"><br>';
          echo '<label for="lname">Last name:</label><br>';
          echo '<input type="text" id="lname" name="lname"><br>';
          echo '<label for="num">Phone Number:</label><br>';
          echo '<input type="tel" id="num" name="num"><br>';
          echo '<label for="email">Email:</label><br>';
          echo '<input type="email" id="email" name="email"><br><br>';
          echo '<input class="button" type="submit" value="Submit">';
          echo '</form>';
        }
        else
        {
          echo '<div class="response">';
          echo '<h3>Thank you for your submission!</h3><br>';
          echo '<p>Hello '.$_POST['fname'].' '.$_POST['lname'].'!</p><br>';
          echo '<p>Your phone number is: '.$_POST['num'].'</p><br>';
          echo '<p>Your E-mail address is: '.$_POST['email'].'</p>';
          echo '</div>';
        }
      ?>
  </main>
</body>

</html>