<?php
  error_reporting(-1);
  ini_set( 'display_errors', 1 );
?>
<!doctype HTML>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/script.js"></script>
    <title>Good Tunes</title>

  </head>
  <body>
    <div class="tablebox">

   <table>
    
      <tr>
      <th>Albums I've heard</th>
      <th>Artists</th>
      </tr>
      
  
      <?php
      $albums = array(
      array("The Sin And The Sentence","Trivium","https://www.youtube.com/playlist?list=OLAK5uy_l3GbuClwAoSWF8rQgLPPNxzDb5A6rV7mQ"),
      array("Monuments And Melodies","Incubus","https://www.youtube.com/playlist?list=OLAK5uy_mOKl5SUT6nfjsPdyWV9Zq37XthnqI1E8w"),
      array("All The Right Reasons","Nickelback","https://www.youtube.com/playlist?list=OLAK5uy_nWrJYamtMCtzlUHCRVfr_d1ow8OT-Pxxk"),
      array("AUSTIN","Post Malone","https://www.youtube.com/playlist?list=OLAK5uy_lgc_b5ThPGAjkhAFscaOAjKvBULnWjD9Y"),
      array("Infest","Papa Roach","https://www.youtube.com/playlist?list=PL52520E951F24AA32"),
      array("Spiral","Rezz","https://www.youtube.com/playlist?list=PLQhEI2AYrg6gNhNGhSwPexfh1AR9hfG_e"),
      array("Back In Black","AC/DC","https://www.youtube.com/playlist?list=OLAK5uy_l83XNDdw6yoNRNhqxzLgFthzDohguKu_A"),
      array("The Young and the Hopeless","Good Charlotte","https://www.youtube.com/playlist?list=PLxzSZG7g8c8wQtIWGCPcnjWcUedd58K5b"),
      array("Hysteria","Def Leoppard","https://www.youtube.com/playlist?list=PLG28ZFgAAiu3WvZe-cVBY0vgoB9PNncEq"),
      array("Self Titled","Boston","https://www.youtube.com/playlist?list=PL6ogdCG3tAWj8JajY1UERX9-SH0PGHs_j"));
      shuffle($albums);
      foreach( $albums as $album )
      {
          echo '<tr>';
          echo '<td> <a href="'.$album[2].'">'.$album[0].'</a></td>';
          echo '<td>'.$album[1].'</td>';
          echo '</tr>';
      }
    

    

       ?>
      
    
   </table>
    </div>

  </body>
</html>
  