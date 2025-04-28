<?php
  error_reporting(-1);
  ini_set( 'display_errors', 1 ); 
  
  class Robot
{
  private $model;
  private $color;
  private $os;
  private $size;
  private $law;
  private $law2;
  private $law3;
  private $img;

  public function __construct($m, $c, $os, $s, $l, $l2, $l3)
  {
    $this->setModel($m);
    $this->setColor($c);
    $this->setOS($os);
    $this->setSize($s);
    $this->setLaw($l);
    $this->setLaw2($l2);
    $this->setLaw3($l3);
    $this->setImg($m);

  }
  public function setModel($m) {$this->model = $m;}
  public function setColor($c) {$this->color = $c;}
  public function setOS($os) {$this->os = $os;}
  public function setSize($s) {$this->size = $s;}
  public function setLaw($l) {$this->law = $l;}
  public function setLaw2($l2) {$this->law2 = $l2;}
  public function setLaw3($l3) {$this->law3 = $l3;}
  public function setImg($m) {

    switch ($m)
    {
      case 'Sonny': 
        $this->img = 'img/sonny.png';
        break;
      case 'Rosey': 
        $this->img = 'img/Rosie.webp';
        break;
      case 'SICO': 
        $this->img = 'img/SICO.webp';
        break;
      case 'Data': 
        $this->img = 'img/Data.jpg';
        break;
      case 'Gort': 
        $this->img = 'img/Gort.avif';
        break;
      case 'Wall-E': 
        $this->img = 'img/wall-e.jpg';
        break;
      case 'OptimusPrime': 
        $this->img = 'img/Optimus_Prime.webp';
        break;
      case 'Hal9000': 
        $this->img = 'img/hal_9000.webp';
        break;
      case 'Twiki': 
        $this->img = 'img/twiki.jpeg';
        break;
      case 'Bender': 
        $this->img = 'img/bender.jpg';
        break;
      case 'Johnny5': 
        $this->img = 'img/johnny.jpg';
        break;

    }
  }

  public function getModel() {return $this->model;}
  public function getColor() {return $this->color;}
  public function getOS() {return $this->os;}
  public function getSize() {return $this->size;}
  public function getLaw() {return $this->law;}
  public function getLaw2() {return $this->law2;}
  public function getLaw3() {return $this->law3;}
  public function getImg() {return $this->img;}

  public function __toString()
  {
    if ($_POST['law1'] == "" && $_POST['law2'] == "" && $_POST['law3'] == "")
    {
      return '<div class="toString"><p class="ordered">Your robot '.$this->getModel().' with a color of '.$this->getColor().' and size of '.$this->getSize().' is being assembled. Your '.$this->getOS().' OS is being loaded in. Brave choice to go without any Laws of Robotics. Please stand by for delivery confirmation. Thank you for your order.</p><img src="'.$this->getImg().'"></div>';
    }
    else {
      return '<div class="toString"><p class="ordered">Your robot '.$this->getModel().' with a color of '.$this->getColor().' and size of '.$this->getSize().' is being assembled. Your '.$this->getOS().' OS is being loaded in. '.$this->getLaw().''.$this->getLaw2().''.$this->getLaw3().'Please stand by for delivery confirmation. Thank you for your order.</p><img src="'.$this->getImg().'"></div>';
      }
  }
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="css/style2.css" type="text/css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>I-Robot</title>
</head>

<body>
  <?php
  if (empty($_POST)){
    echo '<div class="title">';
    echo '<h1>Robot Factory</h1>';
    echo '<p>Build your very own robot!</p>';
    echo '</div>';
    echo '<img src="img/assemblyLine.jpg">';
  }
    
    if (empty($_POST)) echo printOrderForm();
    else 
    {
      if (empty($_POST['law1'])) $_POST['law1'] = "";
      if (empty($_POST['law2'])) $_POST['law2'] = "";
      if (empty($_POST['law3'])) $_POST['law3'] = "";
      $robot = new Robot($_POST['models'], $_POST['colors'], $_POST['os'], $_POST['size'], $_POST['law1'], $_POST['law2'], $_POST['law3']);

      echo '<div class="isSubmit">';
      echo '<p class="received">Your order has been received!</p>';
      echo '<div class="robot">';
      echo $robot;
      echo '</div>';
      echo '<div>'.var_dump($robot).'</div>';
      echo '</div>';  
    }  
    
   ?>
</body>

</html>
<?php
function printOrderForm(){
  $form = '<form method="post" id="form">';
  $form .= '<div class="model">';
  $form .= '<label class="br" for="models">Pick a Robot Model:</label>';
  $form .= '<select id="models" name="models" required>';
  $form .= '<option value="" disabled selected hidden>Model Options</option>';
  $form .= '<option value="Sonny">Sonny</option>';
  $form .= '<option value="Rosey">Rosey</option>';
  $form .= '<option value="SICO">SICO</option>';
  $form .= '<option value="Data">Data</option>';
  $form .= '<option value="Gort">Gort</option>';
  $form .= '<option value="Wall-E">Wall-E</option>';
  $form .= '<option value="OptimusPrime">Optimus Prime</option>';
  $form .= '<option value="Hal9000">Hal 9000</option>';
  $form .= '<option value="Twiki">Twiki</option>';
  $form .= '<option value="Bender">Bender</option>';
  $form .= '<option value="Johnny5">Johnny 5</option>';
  $form .= '</select>';
  $form .= '</div>';
  $form .= '<div class="color">';
  $form .= '<label class="br" for="colors">Pick a Color:</label>';
  $form .= '<select id="colors" name="colors" required>';
  $form .= '<option value="" disabled selected hidden>Color Options</option>';
  $form .= '<option value="shiny">Shiny</option>';
  $form .= '<option value="chrome">Chrome</option>';
  $form .= '<option value="silver">Silver</option>';
  $form .= '<option value="brass">Brass</option>';
  $form .= '<option value="gold">Gold</option>';
  $form .= '<option value="rusted">Rusted</option>';
  $form .= '</select>';
  $form .= '</div>';
  $form .= '<div class="os">';
  $form .= '<label class="br" for="os">Pick a Operating System:</label>';
  $form .= '<select id="os" name="os" required>';
  $form .= '<option value="" disabled selected hidden>OS options</option>';
  $form .= '<option value="linux">Linux</option>';
  $form .= '<option value="unix">Unix</option>';
  $form .= '<option value="SPARC">SPARC</option>';
  $form .= '<option value="binary">Binary</option>';
  $form .= '<option value="DOS">DOS</option>';
  $form .= '<option value="Tiny Hamsters">Tiny Hamsters</option>';
  $form .= '</select>';
  $form .= '</div>';
  $form .= '<h3>Robot size options:</h3>';
  $form .= '<div class="rsize">';
  $form .= '<input id="nano" value="nano" name="size" type="radio" required>';
  $form .= '<label for="nano">Nano</label>';
  $form .= '<input id="normal" value="normal" name="size" type="radio" required>';
  $form .= '<label for="normal">Normal</label>';
  $form .= '<input id="giant" value="giant" name="size" type="radio" required>';
  $form .= '<label for="giant">Giant</label>';
  $form .= '</div>';
  $form .= '<h3>Laws for your robot:</h3>';
  $form .= '<div class="law">';
  $form .= '<input type="checkbox" id="law1" name="law1" value="First Law is encoded. ">';
  $form .= '<label for="law1"><span>First Law</span>A robot must obey the ';
  $form .= 'order given it by a';
  $form .= 'human being or, through inaction, allow a human being to come to';
  $form .= 'harm.</label>';
  $form .= '<input type="checkbox" id="law2" name="law2" value="Second Law is encoded. ">';
  $form .= '<label for="law2"><span>Second Law</span>A robot must obey the ';
  $form .= 'orders given it by human';
  $form .= 'beings except where such orders would conflict with the First';
  $form .= 'Law.</label>';
  $form .= '<input type="checkbox" id="law3" name="law3" value="Third Law is encoded. ">';
  $form .= '<label for="law3"><span>Third Law</span>A robot must protect its';
  $form .= 'own existence as long';
  $form .= 'as such protection does not conflict with the First or Second';
  $form .= 'Law.</label>';
  $form .= '</div>';
  $form .= '</form>';
  $form .= '<input type="submit" form="form" class="button" value="Build Robot">';

  return $form;
}


?>