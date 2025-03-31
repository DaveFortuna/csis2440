<?php
  function getDB()
  {
    //CONNECT TO THE DATABASE
	$conn = mysqli_connect(HOST,USER,PASS,DB);
	
	//WRITE A DB QUERY
  $sql = 'SELECT * FROM universe;';
	
	//RUN DB QUERY 
	$db = mysqli_query($conn, $sql);

	//LOOP THROUGH THE DATA 
	while ($record = mysqli_fetch_array($db, MYSQLI_ASSOC))
	{
		$results[$record['place']] = $record['votes'];
    $votesArray[] = $record['votes'];
	};
  array_multisort($votesArray,SORT_DESC,$results);

  //close connection
  mysqli_close($conn);

  //return results
  return $results;
  }

  function writeToDB($place)
  {
    //CONNECT TO THE DATABASE
    $conn = mysqli_connect(HOST,USER,PASS,DB);
    
    //WRITE A DB QUERY
    $sql = 'update universe set votes = (votes + 1) where place = "'.$place.'"';
    
    //RUN DB QUERY 
    mysqli_query($conn, $sql);

    //close connection
    mysqli_close($conn);
  }

  function printPoll() {
    $result = '<div class="poll">';
    $result .= '<div class="title">';
    $result .= '<h1>Which universe would you live in?</h1>';
    $result .= '</div>';
    $result .= '<form method="post">';
    $result .= '<div class="radio1">';
    $result .= '<input class="radio" id="opt1" name="opt" type="radio" value="lotr">';
    $result .= '<label for="opt1">Lord of the Rings</label>';
    $result .= '</div>';
    $result .= '<div class="raido2">';
    $result .= '<input class="radio" id="opt2" name="opt" type="radio" value="hp">';
    $result .= '<label for="opt2">Harry Potter</label>';
    $result .= '</div>';
    $result .= '<div class="radio3">';
    $result .= '<input class="radio" id="opt3" name="opt" type="radio" value="wh">';
    $result .= '<label for="opt3">Warhammer 40,000</label>';
    $result .= '</div>';
    $result .= '<div class="radio4">';
    $result .= '<input class="radio" id="opt4" name="opt" type="radio" value="mcu">';
    $result .= '<label for="opt4">Marvel Cinematic Universe</label>';
    $result .= '</div>';
    $result .= '<div class="radio5">';
    $result .= '<input class="radio" id="opt5" name="opt" type="radio" value="wow">';
    $result .= '<label for="opt5">World of Warcraft</label>';
    $result .= '</div>';
    $result .= '<div class="submitbox">';
    $result .= '<input class="submit" type="submit" value="Submit">';
    $result .= '</div>';
    $result .= '</form>';
    $result .= '</div>';
    return $result;
  }
  function printResults() {
    $result = '<div class="poll">';
    $result .= '<div class="title"><h1>The voters have voted!</h1></div>';
    $result .= '<div class="results">';
    foreach (getDB() as $key => $value) {
      $result .= '<div>';
      $result .= '<p>';
      $result .= getFullName($key); 
      $result .= ' ('.$value.' vote';
      if ($value != 1) $result .= 's';
      $result .= ')</p>';
      $result .= '<div class="graph" style="width: ';
      $result .= intdiv(500,getMaxVotes()) * $value;
      $result .= 'px;"></div>';
      $result .= '</div>';
    }
    $result .= '</div>';
    $result .= '</div>';
    return $result;
  }
  function getMaxVotes() {

    return max(array_values(getDB()));
  }
  function getFullName($short) {
    switch ($short) {
      case 'lotr': 
        return 'Lord of the Rings';
      case 'mcu':
        return 'Marvel Cinematic Universe';
      case 'wow':
        return 'World of Warcraft';
      case 'wh':
        return 'Warhammer 40,000';
      case 'hp':
        return 'Harry Potter';
    }

  }

?>