<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?> 

<html>
<head>
 <title>Orders</title>
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
require ('./classes/queries/filterdata.php');
require ('dbConnect.php');

session_start();
?>

<h1>Orders</h1>

<h2>Sum of orders</h2>
<?php
// create new object
$orders = new Filterdata($database);
$orders->sumOrders($database);
echo $orders->sumOrders($database);
?>

<h2>WWhere clause</h2>
<p>Find orders by customer email</p>
<p>
<?php



// send object to showAll method
$orders->showAll($database);


echo '<table>';
echo '<tr>';
echo '<th>orderdetails</th>';

echo '<th>price</th>';
echo '<th>total</th>';
echo '</tr>';

// loop through allproducts array
foreach($orders->showAll($database) as $keys => $values) {
  echo '<tr>';
   echo '<td>' .$values['orderdetails']. '</td>';
   echo '<td>' .$values['price']. '</td>';
   echo '<td>' .$values['total']. '</td>';
   echo '</tr>';
}

echo '</table>';
?>
</p>

<h2>Wildcards</h2>
<p>search for a book in cart containing the word 'coaching' using like</p>

<?php 
// send object to showAll method
$orders->findOrders($database);

echo '<table>';
echo '<tr>';
echo '<th>Cart</th>';

echo '<th>price</th>';
echo '<th>total</th>';
echo '</tr>';

// loop through allproducts array
foreach($orders->findOrders($database) as $keys => $values) {
  echo '<tr>';
   echo '<td>' .$values['cart']. '</td>';
   echo '<td>' .$values['price']. '</td>';
   echo '<td>' .$values['total']. '</td>';
   echo '</tr>';
}

echo '</table>';
?>
</p>

</div>
</body>
</html>
