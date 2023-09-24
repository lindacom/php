 <?php
session_start();


?>

<?php include 'testinput.php';?>
<?php include 'dbConnect.php';?> 


<!DOCTYPE html>

<html lang="en">

<head>
  
<title>Checkout</title>
  
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

  <script src="http://lindacom.infinityfreeapp.com/js/store.js" async></script> <!-- provides the code for the shopping cart -->
 
<style>
.cbox {    // grey background for search box
    background-color: #DDD;
	padding: 15px;
	margin-bottom: 15px;
}
</style>
</head>



  
  <body>

  <!-- NAVIGATION-->

   <?php include 'shoppingnav.php';?>

   
<div class="home-wrapper">
 
<h2>Responsive Checkout Form</h2>

<!-- timout using set interval function  -->
<p>Your session will expire after 10 minutes.  You have two minutes to complete this form</p>
<p>Time remaining: <span id="time-remaining">2:00</span></p>

<!-- back button -->
<button type="button" class="success button" onclick="goBack()">Back</button>




<!-- 3 COLUMN LAYOUT-->

 
    <div class="row">

    <!-- left-->

         <div class="columns large-4">
         
         
  
      <form id="billing" name="billing-form" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >

      
       
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label><span class="error">* <?php echo $firstnameErr;?></span> <!-- shows errors on the page -->
            <input type="text" id="fname" name="firstname" placeholder="John Doe" value="<?php echo $firstname;?>">   <!-- keeps the input value in the text box -->

                                                                                     
            
            
           
            <label for="email"><i class="fa fa-envelope"></i> Email</label> <span class="error">* <?php echo $emailErr;?></span>
            <input type="text" id="email" name="email" placeholder="john@example.com" value="<?php echo $email;?>">
           
            
            <label for="adr"><i class="fa fa-address-card"></i> Address</label> <span class="error">* <?php echo $addressErr;?></span>
            <input type="text" id="adr" name="address" value="<?php echo $address;?>">
          
            
            <label for="city"><i class="fa fa-university"></i> City</label>
            <input type="text" id="city" name="city" value="<?php echo $city;?>">

            <label for="town">Town</label>
            <input type="text" id="town" name="data[town]" value="<?php echo $town;?>" >
             
            <label for="postcode">Postcode</label> <span class="error">* <?php echo $postcodeErr;?></span>
            <input type="text" id="postcode" name="postcode" value="<?php echo $postcode;?>">
           
              
          </div>

 <!-- middle column-->
<div class="columns large-4">
                     
                     <h3>Payment</h3>
            <hr />
            <label for="fname">Accepted Cards</label>

             <!-- card icons-->
            
              <i class="fab fa-cc-visa fa-w-18 fa-3x" style="size:50px"; "color:navy;"></i>
              <i class="fab fa-cc-amex fa-w-18 fa-3x" style="color:blue;"></i>
              <i class="fab fa-cc-mastercard fa-w-18 fa-3x" style="color:red;"></i>
              <i class="fab fa-cc-discover fa-w-18 fa-3x" style="color:orange;"></i>

              <hr />
            
            <label for="cname">Name on Card</label><span class="error">* <?php echo $cardnameErr;?></span>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
             
            
            <label for="ccnum">Card number</label><span class="error">* <?php echo $cardnumberErr;?></span>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            
            
            <label for="expmonth">Exp Month</label><span class="error">* <?php echo $expmonthErr;?></span>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            
            
            <label for="expyear">Exp Year</label><span class="error">* <?php echo $expyearErr;?></span> 
            <input type="text" id="expyear" name="expyear" placeholder="2020">
           
              
              
            <label for="cvv">CVV</label><span class="error">* <?php echo $cvvErr;?></span> 
            <input type="text" id="cvv" name="cvv" placeholder="352">
             
              
               
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address is the same as billing address
        </label>
      
      <!-- button to clear the form -->
      
      <button type="button" id="billing" onclick="clearformFunction()" class="success button">Clear form</button>

     
      <button class="button" type="submit" name="submitform" id="btn2" >Submit form</button>
     

       

      </form>
    </div> <!-- end of column -->

<!-- SCRIPT TO SEND FORM DATA TO THE DATABASE (cart details not being inputted) -->

    <?php

  if($error == false){
  

    $sql = "
    INSERT INTO orders (CustomerName, email, orderdetails)
    VALUES (' ".$_POST["firstname"]."','".$_POST["email"]."', '.$val.')
    ";

    $result = mysqli_query($connect,$sql);
    

      }

?> 
  

<!-- right -->

   <div class="columns large-4">

                 <div class="row">
                 <div class="columns large-6">
                      
                      <!-- button and div for testing if cookies is working 

<button type="button" class="success button" onclick="showCookies()">show cookies</button>
</div> -->

<!-- show and hide cart button -->

                   <div class="columns large-6">

                   <button type="button" id="toggle-cart" class="success button" onclick="toggleFunction()">Show/hide cart</button>

</div>



<div id="demo"></div>
     

<!-- SHOPPING CART -->

 <div id="cartsummary" class="checkout-summary cbox">
<span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php 
echo sizeof($_SESSION['cart']);?></b></span>

     <div class="checkout-summary-title">Cart</div>

<div class="checkout-summary-item">
 
                           <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Item Name</th>  
                              <th>Quantity</th> 
                              <th>Quantity</th> 
                               <th>Total</th>  
                              
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                                 <!-- QUANTITY  -->
                               <td><?php echo $values["item_quantity"]; ?></td>  
                         
                              <td> 
                              <div class="input-group input-number-group"> 
                              <input class="input-number" type="number" value="<?php echo $values["item_quantity"]; ?>" min="1" max="10" style="width:70px"> 
                              </div>
                            </td> 

                                 
                                 <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               
                          </tr>  

                            

                          <!-- TOTAL -->
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3">Total</td>  
                               <td colspan="3">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table> 
                     </div>



    </div> 
  
  
  </div> <!-- End of three column layout -->

</div>

<!-- SCRIPTS -->

<!--form timeout -->
<script>
var timeleft = 60 * 2;
var el = document.getElementById('time-remaining');
var timerID = setInterval(function() {

var minutes, seconds;

timeleft= timeleft - 1;

minutes = parseInt(timeleft / 60);
seconds = timeleft % 60;

if (String(seconds).length == 1) {
seconds = "0" + seconds;
}

if (timeleft <= 0) {
clearInterval(timerID);
}

el.innerHTML = minutes + ":" + seconds;
}, 1000);
</script>

<!--back button using browser history -->
  <script>
function goBack() {
  window.history.back()
}
</script>

<!-- cookies associated with this document.-->
<script>
function showCookies() {
  document.getElementById("demo").innerHTML =
  "Cookies associated with this document: " + document.cookie;
}
</script>

<!--reset billingform -->
<script>
function clearformFunction() {
  document.getElementById("billing").reset();
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
