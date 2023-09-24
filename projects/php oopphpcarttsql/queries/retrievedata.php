<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?> 

<html>
<head>
 <title>customers</title>
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
require ('./classes/queries/retrievedata.php');
require ('dbConnect.php');

session_start();
?>

<h1>Customer</h1>
<h2>Concatination</h2>
<p>Combining database fields using string concatination operator.</p>

<p>
<?php

// create new object
$acustomer = new Retrievedata($database);

// send object to showAll method
$acustomer->showAll($database);



// loop through allproducts array
foreach($acustomer->showAll($database) as $keys => $values) {
  
   echo '<td>' .$values["title"]. '</td>';
}
?>
</p>

<h2>Insert into database</h2>
<p>
<?php
//  array to be inserted into database - enter keys xactly as in database fields
$insert_array = array(
    'CustomerID' => 15,
    'CustomerName' => "mary",
    'password' => "79 cool street",
    'dateOfBirth' => "31/03/2020",
    'registered' => "31/03/2020",
    'expiry' => "31/03/2020"

);

// display insert query
$acustomer->addCustomer($database, "table name", $insert_array);
echo $acustomer->addCustomer($database, "table name", $insert_array);


?>
</p>

<h2>Update data in database</h2>

<h2>Delete data in database</h2>

</div>
</body>
</html>
