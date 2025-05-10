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
  $nu .= '<form class="loginform" method="POST">';
  $nu .= '<label for="createusername">Username:</label>';
  $nu .= '<input name="createusername" id="createusername" type="text">';
  $nu .= '<label for="createpassword">Password:</label>';
  $nu .= '<input name="createpassword" id="createpassword" type="password">';
  $nu .= '<label for="createpassword">Verify Password:</label>';
  $nu .= '<input name="createpassword2" id="createpassword2" type="password">';
  $nu .= '<input type="submit" name="newuser" value="Create Account">';
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
    $product .= '<p class="product-rating">'.starRating().'</p>';
    $product .= '<p class="review">'.$productInfo['review'].'</p>';
    $product .= '<p class="quantity"><strong>In Stock: </strong>'; 
    $product .= randomNum().' units</p>';
    $product .= '<p class="price"><strong>Price:</strong>'.$productInfo['price'].'</p>';
    $product .= '<form method="POST">';
    $product .= '<label for="quantity">Qty:</label>';
    $product .= '<input name="quantity" id="quantity" type="number" min="1"'; $product .= 'max="10">';
    $product .= '<input name="purchase" type="submit" value="Purchase">';
    $product .= '</form>';
    $product .= '</div>';
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
    $num = rand(10,50);
    return $num;
}
function starRating() {
    $rating = rand(5, 10) / 2;
    $fullStars = floor($rating);
    $emptyStars = 5 - $fullStars;
    $stars = '<div class="stars">';
    for ($i = 0; $i < $fullStars; $i++) $stars .= '<span class="star full">★</span>';   

    for ($i = 0; $i < $emptyStars; $i++) $stars .= '<span class="star empty">★</span>'; 
    
    $stars .= "<span class='rating-number'>($rating)</span>";
    $stars .= '</div>';

    return $stars;
}
function printCartItem()
{
$item = '<div class="cart">';

$item .= '<div class="cart-item">';
$item .= '<h2>Female Roadrunner Costume</h2>';
$item .= '<img src="img/7.jpg" />';
$item .= '<p>Price:$100</p>';
$item .= '<form action="POST">';
$item .= '<label for="qty">Item qty: </label>';
$item .= '<input name="qty" id="qty" type="number" min="0" max="100" />';
$item .= '</form>';
$item .= '</div>';

$item .= '<div class="cart-item">';
$item .= '<h2>Cork</h2>';
$item .= '<img src="img/7.jpg" />';
$item .= '<p>Price:$100</p>';
$item .= '<form action="POST">';
$item .= '<label for="qty">Item qty: </label>';
$item .= '<input name="qty" id="qty" type="number" min="0" max="100" />';
$item .= '</form>';
$item .= '</div>';




$item .= '</div>';

$item .= '<div class="side-bar">';
$item .= '<div class="shipping">';
$item .= '<p>';
$item .= 'ACME Shipping is powered by hot air balloon, rocket ';
$item .= 'sled, and occasionally a confused carrier pigeon. We ';
$item .= 'guarantee your order will arrive dramatically, ';
$item .= 'if not predictably.';
$item .= '</p>';
$item .= '</div>';
$item .= '<div class="totals">';
$item .= '<p class="cost">Shipping Cost: <span>$100.99</span</p>';
$item .= '<p class="tax">Total Tax: <span>$100.99</span</p>';
$item .= '<p class="discount">Member Discount: <span>10%</span</p>';
$item .= '<p class="total">Grand Total: <span>$100.99</span</p>';
$item .= '<button>Checkout</button>';
$item .= '</div>';
return $item;
}
?>