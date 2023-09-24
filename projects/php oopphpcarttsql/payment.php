<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?> 

<?php
// n.b. customer file should come before dbconnect file in order to use the mysql class for database connection.

require ('./classes/Myorder.php');

require ('./classes/Customer.php');
require ('dbConnect.php');

session_start();
?>

<?php
if(isset($_GET["name"])){     
    $name = $_GET["name"];
}
?>

<?php 
// n.b. customer file should come before dbconnect file in order to use the mysql class for database connection. 
// creates new customer object and gets results of query in customer class

$newcustomer = new Customer ($database, $name);
$newuser = $newcustomer->getCustomerName($database, $name);

 print_r($newcustomer->getCustomerName($database, $name)); // associative array

// print_r( $newuser["address"]); // access individual value from associative array

//print_r($newcustomer->getCustomerName($database, $name)->get_name());
//print_r($newcustomer->getCustomerName($database, $name)->get_address());

// SET CUSTOMER SESSION FOR USE ON NEXT PAGE
if($newuser) {
    $_SESSION["firstcustomer"] = $newuser;
  //  echo 'session customer:';
   // print_r( $_SESSION["firstcustomer"]);
}

?>

<?php

// do check to see if user logged in
 if(empty($_SESSION["mytitles"]))  
                          { 
    echo '<script>alert("you have no items in the cart ")</script>';
    header("location: products.php");
    exit; // prevent further execution, should there be more code that follows
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  
<title>Payment</title>
  
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://lindacom.infinityfreeapp.com/css/app.scss">
   <link rel="stylesheet" href="http://lindacom.infinityfreeapp.com/css/modules.scss">
    <link rel="stylesheet" type="text/css" href="http://lindacom.infinityfreeapp.com/css/productcard.scss">
     <link rel="stylesheet" type="text/css" href="http://lindacom.infinityfreeapp.com/css/footer.scss">
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.css">
     <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/plugins/foundation.orbit.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />
</head>
  
  <body>

  <!-- NAVIGATION-->   
<div class="home-wrapper">

<div class="clearfix">
<div class="float-left"><h1><i class="fas fa-lock"></i> Responsive Checkout Form</h1></div>
<div class="float-right"><p style="color:#EB0000;"><em>* This information is required</em></p></div>
<hr />
</div>

<!-- 3 COLUMN LAYOUT-->
 
    <div class="row">
    <!-- left column-->

         <div class="columns large-4" role="main">      
        
    <!--  <form id="billing" name="billing-form" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" > -->    
       <form id="billing" name="billing-form" action= "myorder.php" method="post" >
            <h2>Billing Address</h2>

              <label for="id"><i class="fa fa-envelope"></i> ID</label> 
               <!--<span class="error">* <?php echo $emailErr;?></span> -->
            <input type="text" id="id" name="id" placeholder="id" value="<?php print_r( $newuser["CustomerID"]);?>" readonly>

            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <!-- <span class="error">* <?php echo $firstnameErr;?></span> <!-- shows errors on the page -->
            <input type="text" id="fname" name="firstname" placeholder="John Doe" value="<?php print_r( $newuser["CustomerName"]);?>" readonly>
            <!-- <?php echo $fetchRow['fullName']?>-->    <!-- keeps the input value in the text box -->                                                                         
            
            <label for="email"><i class="fa fa-envelope"></i> Email</label> 
            <!--<span class="error">* <?php echo $emailErr;?></span> -->
            <input type="text" id="email" name="email" placeholder="john@example.com" value="<?php print_r( $newuser["email"]);?>" readonly>

            <!--value="<?php echo $email;?>"-->           
            
            <label for="adr"><i class="fa fa-address-card"></i> Address</label> 
            <!--<span class="error">* <?php echo $addressErr;?></span> -->
            <input type="text" id="adr" name="address" value="<?php print_r( $newuser["address"]);?>" readonly>
          <!--"<?php echo $address;?>"-->
            
            <label for="city"><i class="fa fa-university"></i> City</label>
            <input type="text" id="city" name="city" value="<?php print_r( $newuser["city"]);?>" readonly>
           <!-- "<?php echo $city;?>"-->

            <label for="town">Town</label>
            <input type="text" id="town" name="town" value="<?php print_r( $newuser["town"]);?>" readonly >
           <!-- "<?php echo $town;?>"-->
             
            <label for="postcode">Postcode</label> 
            <!--<span class="error">* <?php echo $postcodeErr;?></span> -->
            <input type="text" id="postcode" name="postcode" value="<?php print_r( $newuser["postcode"]);?>" readonly>
           <!-- "<?php echo $postcode;?>"-->           
              
          </div>

 <!-- middle column-->
<div class="columns large-4">
                     
                     <h2>Payment</h2>
            <hr />
            <label for="fname">Accepted Cards</label>

             <!-- card icons-->
          
          <a href="#" id="visa" aria-label="visa">   <i class="fab fa-cc-visa fa-w-18 fa-3x" style="size:50px"; "color:navy;" ></i></a>
            <a href="#" id="amex" aria-label="amex">    <i class="fab fa-cc-amex fa-w-18 fa-3x" style="color:blue;"></i></a>
            <a href="#" id="mastercard" aria-label="mastercard">   <i class="fab fa-cc-mastercard fa-w-18 fa-3x" style="color:red;"></i></a>
            <a href="#" id="discover" aria-label="discover">   <i class="fab fa-cc-discover fa-w-18 fa-3x" style="color:orange;"></i></a>

              <hr />
            
            <label for="cname">Name on Card</label>
            <!--<span class="error">* <?php echo $cardnameErr;?></span>-->
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
             
            
            <label for="ccnum">Card number</label>
            <!--<span class="error">* <?php echo $cardnumberErr;?> <?php echo $cardnumberErr2;?></span> -->
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            
                      
            <label for="expmonth">Exp Month</label>
            <!--<span class="error">* <?php echo $expmonthErr;?></span> -->
          
           

<select name="expmonth" id="expmonth">
<option value="">Select a month</option>
  <option value="january">January</option>
  <option value="february">February</option>
  <option value="march">March</option>
  <option value="april">April</option>
  <option value="may">May</option>
  <option value="june">June</option>
  <option value="july">July</option>
  <option value="august">August</option>
  <option value="september">September</option>
  <option value="october">October</option>
  <option value="november">November</option>
  <option value="december">December</option>
</select>
            
            
            <label for="expyear">Exp Year</label>
            <!--<span class="error">* <?php echo $expyearErr;?></span> -->
      

        <select name="expyear" id="expyear">
<option value="">Select a year</option>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
  <option value="2022">2022</option>
  <option value="2023">2023</option>
  <option value="2024">2024</option>
  <option value="2025">2025</option>
  <option value="2026">2026</option>
  <option value="2027">2027</option>
  <option value="2028">2028</option>
  <option value="2029">2029</option>
  <option value="2030">2030</option>
  <option value="2031">2031</option>
</select>          
                   
            <label for="cvv">CVV</label>
            <!--<span class="error">* <?php echo $cvvErr;?> <?php echo $cvvErr2;?></span> -->
            <input type="text" id="cvv" name="cvv" placeholder="352">
                   
            
      <!-- button to clear the form -->
      
      <button type="button" id="billingbtn" onclick="clearformFunction()" class="button" style="background-color:#AF824C !important; font=size:19px;"><strong>Clear form</strong></button>

     
      <button class="button" type="submit" name="submitform" id="btn2" style="background-color:#38803E !important;" >Submit form</button>   

      </form>
    </div> <!-- end of column -->

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

<!-- right column -->

   <div class="columns large-4">

                 <div class="row">
                 <div class="columns large-6">

<!-- show and hide cart button -->

                <div class="columns large-12"> 

                   <h2>Cart</h2>
                
                <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> 
                    <b><?php 
                        echo sizeof($_SESSION['mytitles']);?></b>
                        </span>
                        <button type="button" id="toggle-cart" class="button" onclick="toggleFunction()" style="background-color: #38803E;">Show/hide                                   cart</button> </div>

             </div>

   
<!-- SHOPPING CART -->

 <div id="cartsummary" class="checkout-summary cbox">   

<div class="checkout-summary-item">
 
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
                     <a href="http://lindacom.infinityfreeapp.com/shopping/myproducts"> <button type="button" class="button" style="background-color:#38803E;">Edit basket</button></a>
                     </div>



    </div> 
  
  
  </div> <!-- End of three column layout -->

</div>

<!--reset billingform -->
<script>
function clearformFunction() {
  document.getElementById("billingbtn").reset();
}
</script>

<!--toggle cart -->

<script>
function toggleFunction() {
  var x = document.getElementById("cartsummary");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

</body>
</html>






