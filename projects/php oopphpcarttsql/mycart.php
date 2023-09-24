<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?> 



<html>
<head>
 <title>My cart</title>
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
include ('./classes/Mycart.php');

session_start();

?>

<h1>My Cart</h1>
<a href="logout.php" >Logout</a> |
<a href="products.php">Go to all products</a> |
<a href="myproducts.php">Return to my products</a> |
<a href="payment.php">Payment</a>

 <div id="deli" class="callout clearfix">

        <div class="float-left"><span style="color:blue"><i class="fa fa-truck fa-5x"></i><p>For delivery</p>
                                                   </div>
  
  <!-- display number of items in the cart -->
            <div class="float-right"> <span class="price" style="color:black"><i class="fa fa-shopping-cart fa-5x"></i> <b>
  <?php 
  if(isset($_SESSION['mytitles'])) {
echo sizeof($_SESSION['mytitles']);
  }?>
  </b></span>
             </div>

</div>       
            

                         <!-- if there are items in the cart, display the contents of the cart -->
                          <?php   
echo '<div class="clearfix">';
echo '<div class="float-left"  role="main"><h2>Your order</h2></div>';
echo '<div class="float-right">
               
                  <button class="success button" type="button" style="background-color:#38803E;font-size:19px;" id="payment">Payment > </button>
                       </div>';
echo '<hr />';
echo '</div>';
?>

<h2>My cart from mycart class</h2>
<h3> cart from product session </h3>
<?php



// GET BOOKS AND CREATE A CART OBJECT FOR EACH BOOK

    if(isset($_SESSION["mytitles"])){ // books

    foreach ($_SESSION["productsforcart"] as $items){
             $king_array =  $_SESSION["productsforcart"];
       $kingcart = new Mycart();
                 $kingcart->setItems($king_array);
                $_SESSION["thiscart"] =  $kingcart; 
     
        
/*echo "Number of items in cart: ".PHP_EOL;
echo $kingcart->getTotalQuantity().PHP_EOL; 
echo "Total price of items in cart: ".PHP_EOL;
echo $king->getTotalSum().PHP_EOL; */
echo '<br>';
echo '<br>';
 echo '<pre>',print_r($kingcart) ,'</pre>'; // mycart object - items mycart private - array

     }
    
  }           
      
?>

<h3> Session details from cart session</h3>
<?php

echo 'SESSION';
echo '<pre>',print_r($_SESSION["thiscart"]) ,'</pre>'; // mycart object - items mycart private - array
?>

<?php

echo '<br /><br />';
 

 echo '<p id="payment"><a href="#" class="success button" target="_blank">Payment</a></p>';

 // echo '<td> <p id="mycart"><a  href="myproducts.php?action=get&id='.$values['id'].'&title='.$values["title"].'&price='.$values["price"].'&quantity=1">Add to cart</a></p></td>';
?>

<?php
  /* FOR INFORMATION
  foreach ($_SESSION["mytitles"] as $keys=>$values){ // loop through books and get details  
                 $king_array = [
                    $id = $values['id'],
                    $title = $values['title'],
                    $quantity = 13
                 ];
                       
                 //  $kingcart = new Mycart($id, $title, $quantity = '13');    // cart object
                  $kingcart = new Mycart();
                 $kingcart->setItems($king_array);
                $_SESSION["thiscart"] =  $kingcart;*/
                ?>

                </div>

<script>
 $(document).ready(function(){
  $("#payment").click(function(){
  
    var txt;
  var person = prompt("Please enter your name:", "linda");
  if (person == null || person == "") {
    txt = "User cancelled the prompt.";
  } else {
      txt = person;
     
    window.location.href = "payment.php?name=" + encodeURIComponent(txt);
  }
  });
 });
</script>



                </body></html>