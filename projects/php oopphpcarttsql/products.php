<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?> 

<html>
<head>
 <title>All products</title>
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
require ('./classes/Allproducts.php');
require ('dbConnect.php');

session_start();
?>

<h2>Products (from Allproducts class)</h2>
<hr />
<p style="float:right"> <a href="myproducts.php">Go to basket >></a></p>

<!-- search box-->
        <div class="sbox" style="clear:right">
        <h3 style="font-family: 'Train+One', serif;">Quick search</h3>
          <div class="form-group ">
            <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Search by title, author or category" role="search">
          </div>
          <p class="text-right"><a href="http://lindacom.infinityfreeapp.com/books/librarysearchfull.php" style="color:white">Full search</a></p>
        </div>
<?php

// creates new products object and gets results of query in all products class
echo '
    <div class="table-responsive">
   <table class="table table bordered">
        <tr>
    <th>ID</th>
    <th>Book Title</th>
    <th>Category</th>
     <th>Price</th>     
     <th>Purchase</th>
  </tr>
    ';

$allproducts = new Allproducts($database);

$allproducts->showAll($database);

// loop through allproducts array
foreach($allproducts->showAll($database) as $keys => $values) {
  echo '<tr>';
  
  echo '<td>' .$values["id"]. '</td>';
   echo '<td>' .$values["title"]. '</td>';
  echo '<td></td>';
 
   echo '<td>' .$values["price"]. '</td>';
 
 echo '<td> <p id="mycart"><a  href="myproducts.php?id='.$values['id'].'&title='.$values["title"].'&price='.$values["price"].'&quantity=1">Add to cart</a></p></td>';
}
 echo '</tr>';
echo '</table>';
echo '</div>';

?>

</div>
</body>
</html>
