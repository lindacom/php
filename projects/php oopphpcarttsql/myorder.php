<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?> 

<?php
include ('./classes/Myorder.php');
session_start();
?>

<html>
<head>
 <title>Order confirmation</title>
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
<h1>Order confirmation</h1>
<a href="logout.php" >Logout</a> |
<a href="products.php">Go to all products</a> |
<a href="myproducts.php">Return to my products</a> |
<a href="payment.php">Payment</a>

<h2> Customer </h2>

<?php

// GET CUSTOMER SESSION 
if(isset($_SESSION["firstcustomer"])) {
     echo 'session customer:';
   print_r( $_SESSION["firstcustomer"]); // associative array
} else {
    header('location: products.php');
}

?>

<h2> Merge two arrays - customer and books</h2>

<?php
// echo '<pre>';
print_r(array_merge( $_SESSION['mytitles'], $_SESSION["firstcustomer"]));
// echo '</pre>';
?>

<h2>Books array </h2>
<?php
if(isset($_SESSION['mytitles'])) {
     echo '<br />';
     echo 'my titles:';
     echo '<pre>';
   print_r( $_SESSION['mytitles']); // multidimensional array
   echo '</pre>';
}


?>



<!-- <h2> Combined array send to order class and return values </h2> -->
<h2> Books array sent to order class and return values </h2>
<?php
// $lastorders = array_merge( $_SESSION['mytitles'], $_SESSION["firstcustomer"]);
$id = $_SESSION["firstcustomer"]["CustomerID"];
$name = $_SESSION["firstcustomer"]["CustomerName"];

$luka = new Myorder($id, $name, $_SESSION['mytitles']);
//$luka->getOrder();


//print_r( $_SESSION["firstcustomer"]["CustomerID"]);
//print_r( $_SESSION["firstcustomer"]["CustomerName"]);

?>

<?php
echo '<hr />';
echo 'printing order object for inserting into database:';

    echo '<pre>';
    print_r($luka);
echo '</pre>';

?>

<!-- SCRIPT TO SEND FORM DATA TO THE DATABASE (cart details not being inputted) 

    <?php

  if($error == false){  

    $sql = "
    INSERT INTO orders (CustomerName, email, address, orderdetails)
    VALUES (' ".$_POST["firstname"]."','".$_POST["email"]."', '".$_POST["address"]."', '.$val.')
    ";

    $result = mysqli_query($connect,$sql);

      }
?>  --> 

 

                   <h2>Cart</h2>
                
             <?php 
                        echo sizeof($_SESSION['mytitles']);?>

   
                       <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Item Name</th>  
                              <th>Quantity</th> 
                                 <th>Total</th>  
                                                       </tr>  
                          <?php   
                          if(!empty($_SESSION["mytitles"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["mytitles"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                                 <!-- QUANTITY  -->
                               <td><?php echo $values["item_quantity"]; ?></td>  
                         <td><?php echo $values["item_price"]; ?></td>  
                                                      

                          <!-- TOTAL -->
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <td></td>
                           </tr>
                           <tr>  
                               <td><strong>Order total</strong></td>  
                                <td></td>
                               <td><strong>£ <?php echo number_format($total, 2); ?></strong></td>  
                             
                          </tr>  
                          <?php  
                          }  
                          ?>                          
                     </table> 
                                         </div>

                                         <button type="button" class="success button">Save order</button>
<button type="button" class="alert button">Delete order</button>

</body>
</html>