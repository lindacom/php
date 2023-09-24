<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();
?> 



<html>
<head>
 <title>My products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<!-- this is a link to google fonts.  then to use this font add inline style to an element - style="font-family: 'Open+Sans', serif;" -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet"> 
<!-- this is a link to google fonts.  then to use this font add inline style to an element - style="font-family: 'Train+One', serif;" -->
   <link rel="stylesheet" href="http://lindacom.infinityfreeapp.com/css/app.scss">
   <link rel="stylesheet" type="text/css" href="http://lindacom.infinityfreeapp.com/css/modules.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/css/foundation.min.css">
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/foundation.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/plugins/foundation.orbit.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
<div class="grid-container">

<?php 
// require ('./classes/Bootstrap.php');
include ('./classes/Product.php');
//session_start();
?>
<h1>My products</h1>
<a href="logout.php" >Logout</a> |
<a href="products.php">Return to all products</a> |
<a href="mycart.php">View basket</a>
<hr />

<!-- get product details from the url -->

<?php
if(isset($_GET["title"]))  {
$id = $_GET["id"];
$title = $_GET["title"];
$price = $_GET["price"];
$quantity = $_GET["quantity"];
} else {
    header ('location: products.php');
}
?>

<h2>ARRAY OF BOOK DETAILS FROM URL TO SESSION</h2>
<?php
// ARRAY OF BOOK DETAILS FROM URL SAVED TO A SESSION
if(isset($_GET["title"]))  {
   if(isset($_SESSION["mytitles"])){ //if session already exists
      $count = count($_SESSION["mytitles"]);  // count number of items in the cart
        $item_array = array(  // create a multidimensional array using id, title, price and quantity from url
                'item_id'               =>     $_GET["id"],
                   'item_name' =>     $_GET["title"], 
                    'item_price'          =>    $_GET["price"], 
                     'item_quantity'          =>     $_GET["quantity"]
           );  
           $_SESSION["mytitles"][$count] = $item_array;  // store item array in cart session
} else {
    $item_array = array(  // create a multidimensional array using id, title, price and quantity from url
                'item_id'               =>     $_GET["id"],
                   'item_name' =>     $_GET["title"], 
                    'item_price'          =>    $_GET["price"], 
                     'item_quantity'          =>     $_GET["quantity"]
           ); 
    $_SESSION["mytitles"][0] = $item_array;
}


}
echo '<pre>',print_r( $_SESSION["mytitles"]) ,'</pre>';
?>

<!-- loop through session and create a product object -->

<h2>Product objects for each item in session array</h2>

<?php

// Create product objects for each item in array, print the list of objects and store the objects in a session




                foreach ($_SESSION["mytitles"] as $keys=>$values){

                   $id = $values['item_id'];
                    $title = $values['item_name'];
                  $price = $values['item_price'];              
                  
                    $keying[] = new Product($id, $title, $price); 
                         
              //  echo '<pre>', print_r( $keying->getId()) ,'</pre>';
              //  echo '<pre>', print_r( $keying->getTitle()) ,'</pre>';
              //  echo '<pre>', print_r($keying->getPrice()) ,'</pre>';

              print "<pre>";
print_r($keying);
print "</pre>";

             //  $_SESSION["goodbye"] = serialize($keying); // To serialize an object means to convert its state to a byte stream so that the byte stream can be reverted back into a copy of the object (unserialized).
$_SESSION["productsforcart"] = $keying;

              
}      
?>

<!-- print the products in the session -->
<h3>Products session for use on other pages</h3>
<?php

 
   echo 'SESSION <br />';

    echo '<pre>', print_r($_SESSION["productsforcart"]) ,'</pre>';



?>

<?php

echo '<br /><br />';
 echo '<a href="products.php" class="success button" id="cart">Return to all products</a><br /><br />';
 echo '<a href="mycart.php" class="success button" id="cart" target="_blank">View basket</a><br /><br />';

?>

</div>
</body>
</html>


