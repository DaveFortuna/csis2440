<?php
function isGranted()
  {
    if(isset($_SESSION['granted'])) return true;
    
    return false;
}
function navBar()
{
$nav = '<div class="nav">';
  $nav .= '<a href="index.php">Home</a>';
  $nav .= '<a href="catalog.php">Products</a>';
  if (isGranted())$nav .= '<a href="cart.php">Cart</a>';
  if (isGranted())$nav .= '<a href="logout.php">Logout</a>';
  $nav .= '</div>';
return $nav;
}
function createAccount()
{
  $ca = '<div class="createAccount">';
  $ca .= '<a href="create-account.php" class="button-link">Create Account</a>';
  $ca .= '</div>';
  return $ca;
}
function newUser()
{
  $nu = '';
  $nu .= '<div class="homebox">';
  $nu .= '<form class="loginform" id="createuser" method="POST">';
  $nu .= '<label for="createusername">Username:</label>';
  $nu .= '<input name="createusername" id="createusername" type="text">';
  $nu .= '<label for="createpassword">Password:</label>';
  $nu .= '<input name="createpassword" id="createpassword" type="password">';
  $nu .= '<label for="createpassword">Verify Password:</label>';
  $nu .= '<input name="createpassword2" id="createpassword2" type="password">';
  $nu .= '<input id="submit" type="submit" name="newuser" value="Create Account" disabled>';
  $nu .= '<input class="reset" type="reset">';
  $nu .= '</form>';
  $nu .= '</div>';
return $nu;
}
function login()
{
$lf = '<div class="loginform">';
  $lf .= '<form method="POST">';
    $lf .= '<label for="username">Username:</label>';
    $lf .= '<input name="username" id="username" type="text" required>';
    $lf .= '<label for="password">Password:</label>';
    $lf .= '<input name="password" id="password" type="password" required>';
    $lf .= '<input name="submit" type="submit" value="Login">';
    $lf .= '</form>';
  $lf .= '</div>';

return $lf;
}
function loginWForm()
  {
    echo '<h1>Welcome to the ACME Store</h1>';
    echo '<div class="homebox"><div class="loginh1">';
    echo '<h3>Login to Your Account</h3>';
    echo '</div>';
    echo login();
    echo createAccount();
    echo '</div>';
}
function loggedIn()
{
  echo '<div class="homebox">';
  echo '<h1 class="wb">Welcome back '.$_SESSION['username'].'!</h1>';
  echo '</div>';
}
function productCard()
   {
    
    echo '<div class=productholder>';
    for ($i = 1; $i <= 20; $i++)
    {
      $productInfo = getProductFromDB($i);
      
      $product = '<div class="product">';
      $product .= '<h3>'.$productInfo['name'].'</h3>';
      $product .= '<img src="img/'.$i.'.jpg">';
      $product .= '<div class="description">';
      $product .= '<p class="headline">'.$productInfo['headline'].'</p>';
      $product .= '</div>';
      $product .= '<p>'.starRating().'</p>';
      $product .= '<p>'.itemsSold().'</p>';   
      $product .= '<a href="product.php?id='.$i.'" class="button-link">';
      $product .= 'Buy Now</a>';
      $product .= '</div>';
      echo $product;
    }
    echo '</div>';
}
function printProduct($id) {
  $productInfo = getProductFromDB($id);

  $product = '<div class="product-page">';
  $product .= '<h1>'.$productInfo['name'].'</h1>';
  $product .= '<div class="product-box">';
  $product .= '<div class="product-image">';
  $product .= '<img src="'.$productInfo['image'].'" alt="ACME Product">';
  $product .= '</div>';
  $product .= '<div class="product-info">';
  $product .= '<p class="description">'.$productInfo['description'].'</p>';
  $product .= '<p class="review">'.$productInfo['review'].'</p>';
  $product .= '<p class="product-rating">'.starRating().'</p>';
  $product .= '<p class="quantity"><strong>In Stock: </strong>'; 
  $product .= randomNum().' units</p>';
  $product .= '<p class="price"><strong>Price:</strong>';
  $product .= ''.$productInfo['price'].'</p>';
  $product .= '<form method="POST">';
  $product .= '<input type="hidden" value="'.$_GET['id'].'">';
  if (isGranted()) {$product .= '<label for="quantity">Qty:</label>';
  $product .= '<input name="qty" id="qty" type="number" min="1"'; 
  $product .= 'max="500">';
  $product .= '<input onclick="'.addToCart().'" name="add-to-cart"';
  $product .= 'type="submit" value="Add to Cart"></form>';} 
  $product .= '</div>';
  if (!isGranted()){$product .= '<div class="sign-in"><p>Please sign in or'; $product .= 'make an account with us to make a purchase.</div>';
  $product .= '<div class="nonuser-button"><a class="button-link"'; 
  $product .= 'href="index.php">Login Page</a>';
  $product .= '<div class="create-acc"><a class="button-link"';
  $product .= 'href="create-account.php">Create Account</a></div></div>';} 
  $product .= '</div>'; 
  $product .= '</div>';  
  
  return $product;
}
function itemsSold()
  {
    $sold = rand(20,999);
    return 'sold this month: '.$sold;
}
function randomNum()
  {
    $num = rand(10,999);
    return $num;
}
function starRating() {
    $rating = rand(1, 5);
    $fullStars = floor($rating);
    $emptyStars = 5 - $fullStars;
    $stars = '<div class="stars">';
    for ($i = 0; $i < $fullStars; $i++) $stars .= '<span class="star full">★</span>';   

    for ($i = 0; $i < $emptyStars; $i++) $stars .= '<span class="star empty">☆</span>'; 
    
    $stars .= "<span class='rating-number'>($rating)</span>";
    $stars .= '</div>';

    return $stars;
}
function printCartItem($x)
{
$item = '<div class="cart-item">';
$item .= '<h2>'.$_SESSION['product-name'][$x].'</h2>';
$item .= '<img src="img/'.$_SESSION['product-id'][$x].'.jpg" />';
$item .= '<p>Price:<br>$'.$_SESSION['price'][$x].'</p>';
$item .= '<label for="qty-'.$x.'">Qty:<br>'.$_SESSION['qty'][$x].' </label>';
$item .= '<input name="qty-'.$x.'" id="qty-'.$x.'" type="number" min="0" max="500">';
$item .= '</div>';

return $item;

}

function printSideBar()
{

$sideBar = '<div class="side-bar">';
$sideBar .= '<div class="shipping">';
$sideBar .= '<p>';
$sideBar .= 'ACME Shipping is powered by hot air balloon, rocket ';
$sideBar .= 'sled, and occasionally a confused carrier pigeon. We ';
$sideBar .= 'guarantee your order will arrive dramatically, ';
$sideBar .= 'if not predictably.';
$sideBar .= '</p>';
$sideBar .= '</div>';
$sideBar .= '<div class="totals">';

$sideBar .= '<div class="totals-columns">';
$sideBar .= '<div class="left">';
$sideBar .= '<p class="cost">Shipping:</p>';
$sideBar .= '<p class="tax">Tax:</p>';
$sideBar .= '<p class="discount">Discount:</p>';
$sideBar .= '<p class="total">Grand Total:</p>';
$sideBar .= '</div>';

$sideBar .= '<div class="right">';
$sideBar .= '<p class="blue">$'.number_format(calcShipping(),2).'</p>';
$sideBar .= '<p class="blue">$'.number_format(calcTax(),2).'</p>';
$sideBar .= '<p class="blue">-$'.number_format(calcDiscount(),2).'</p>';
$sideBar .= '<p class="blue">$'.number_format(grandTotal(),2).'</p>';
$sideBar .= '</div>';
$sideBar .= '</div>';

$sideBar .= '<br>';
$sideBar .= '<a class="button-link" href="checkout.php">Checkout</a>';
$sideBar .= '</div>';
return $sideBar;
}
function printEmptyCart()
{
$empty = '<div class="emptycart">';
$empty .= '<h1>Your Cart is Empty</h1>';
$empty .= '<p>';
$empty .= 'Looks like you haven’t added anything yet — not even a ';
$empty .= 'single anvil! Head back to the <a href="catalog.php">';
$empty .= 'Product Page</a> and load up before Wile E. ';
$empty .= 'beats you to it!</p>';
$empty .= '</div>';
return $empty;
}
function printSuggestion()
{
  $suggestion = '<div class="product-suggestion">';
  $suggestion .= '<label for="suggestion">Can\'t find the kaboom you’re ';
  $suggestion .= 'looking for? Let us know what outrageous ACME contraption ';
  $suggestion .= 'we should cook up next:</label><textarea id="suggestion" ';
  $suggestion .= 'name="suggestion" rows="4" cols="45"placeholder="Think ';$suggestion .= 'bigger! ';
  $suggestion .= 'Rocket-powered slingshot? Self-filling pie cannon? ';
  $suggestion .=  'Lay it on us!"></textarea>';
  $suggestion .= '<button onclick="clearSuggestion()" class="suggest-submit">Submit Suggestion</button>';
  $suggestion .= '</div>';
  return $suggestion;
}
function addToCart()
{
if (isset($_POST['add-to-cart']))
{
  $productInfo = getProductFromDB($_GET['id']);
  if (!isset($_SESSION['product-id']))
  {
    
    $_SESSION['product-id'] = array();
    $_SESSION['qty'] = array();
    $_SESSION['product-name'] = array();
    $_SESSION['price'] = array();
    
  }
  
    $hit = false;
    for ($i = 0; $i < sizeof($_SESSION['product-id']); $i++)
    {
      if ($_SESSION['product-id'][$i] == $productInfo['id'])
      {
        $_SESSION['qty'][$i] += $_POST['qty'];
        $hit = true;
        break;
      }
    }
    if (!$hit){
      array_push($_SESSION['product-id'], $productInfo['id']);
      array_push($_SESSION['qty'], $_POST['qty']);
      array_push($_SESSION['product-name'], $productInfo['name']);
      array_push($_SESSION['price'], $productInfo['price']);}
  
}
}
function calcShipping()
{
  $subTotal = 0;
  for ($x = 0; $x < sizeof($_SESSION['qty']); $x++)
  {
    $subTotal += intval($_SESSION['qty'][$x]) * floatval($_SESSION['price'][$x]);
  }
  return $subTotal * .03;
}
function calcTax()
{
  $subTotal = 0;
  for ($x = 0; $x < sizeof($_SESSION['qty']); $x++)
  {
    $subTotal += intval($_SESSION['qty'][$x]) * floatval($_SESSION['price'][$x]);
  }
  return $subTotal * .06;
}
function calcDiscount()
{
  $subTotal = 0;
  for ($x = 0; $x < sizeof($_SESSION['qty']); $x++)
  {
    $subTotal += intval($_SESSION['qty'][$x]) * floatval($_SESSION['price'][$x]);
  }
  return $subTotal * .1;
} 
function grandTotal()
{
  $subTotal = 0;
  for ($x = 0; $x < sizeof($_SESSION['qty']); $x++)
  {
    $subTotal += intval($_SESSION['qty'][$x]) * floatval($_SESSION['price'][$x]);
  }
  return $subTotal + calcShipping() + calcTax() - calcDiscount();
}
function printCheckoutItem($x)
{

$item = '<div class="cart-item">';
$item .= '<h2>'.$_SESSION['product-name'][$x].'</h2>';
$item .= '<img src="img/'.$_SESSION['product-id'][$x].'.jpg" />';
$item .= '<p>Price:<br>$'.$_SESSION['price'][$x].'</p>';
$item .= '<p>Qty:<br>'.$_SESSION['qty'][$x].' </p>';
$item .= '</div>';
return $item;
}
function checkout($x){
  $checkout = '<div class="order-num"><p>Order#: '.randomNum().'</p>'; 
  $checkout .= '</div>';
  $checkout .= '<div class="thank-you">';
  $checkout .= '<p>Thank you '.$_SESSION['username'].' for placing an '; 
  $checkout .= 'order with the ACME store!</p>';
  $checkout .= '<p>It’s officially in the hands of our highly trained ';
  $checkout .= '(and slightly explosive) delivery team, guaranteed ';
  $checkout .= 'to arrive with flair, fanfare, and ';
  $checkout .= 'maybe a puff of smoke!</p>';
  $checkout .= '</div>';
  $checkout .= '<div class="cart">';
  
  for ( $x = 0; $x < sizeof($_SESSION['product-id']); $x++)
      {
        $checkout .= '<p>'.printCheckoutItem($x).'</p>';
      }
      
  $checkout .= '</div>';
  $checkout .= '<div class="out-total">';
  $checkout .= '<p>Order total:$'.number_format(grandTotal(),2).'</p>';
  $checkout .= '</div>';
  
  unset($_SESSION['product-id']);
  unset($_SESSION['qty']);
  unset($_SESSION['product-name']);
  unset($_SESSION['price']);
  return $checkout;
    }
?>