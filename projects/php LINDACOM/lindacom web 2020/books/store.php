<?php
    session_start();
/*
    // if there is title in the url and if the session is not alreay set then the session is empty

    if(isset($_GET['title']) && $_GET['title'] !== ""){
        if(!isset($_SESSION['cart']) && !is_array($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        } 
//push item from url into session
array_push($_SESSION['cart'], $_GET['title']);
}*/
 if(isset($_GET['title']) && $_GET['title'] !== ""){
      if(isset($_SESSION["cart"]))  
      {  
           $item_array_id = array_column($_SESSION["cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],
                   'item_name' =>     $_GET["title"], 
                    'item_price'          =>    $_GET["price"], 
                     'item_quantity'          =>     $_GET["quantity"]
                );  
                $_SESSION["cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="librarysearch.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],
                   'item_name' =>     $_GET["title"], 
                    'item_price'          =>    $_GET["price"], 
                     'item_quantity'          =>     $_GET["quantity"]
           );  
           $_SESSION["cart"][0] = $item_array;  
      } 
     
 }
      
    
    

 
?>

<?php   

   if(isset($_GET["action"]))  
 {  
     if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {                     
                  unset($_SESSION["cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="librarysearch.php"</script>';  
                }  
           }  
      }  
 }
 ?>

<?php include 'dbConnect.php'; ?> 

<!--  <?php 
  
  $whereIn = implode(',' , $_SESSION['cart']); //seperates items in cart with commas

// select everything from books table where title matches the title in the cart 

  $sql = "SELECT * FROM books
  WHERE title IN ($whereIn) 
  ";

   $output = '
         
  ';
 
  ?> -->


<!DOCTYPE html>
<html>
    <head>
        <title>Shopping cart</title>
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
<!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/plugins/foundation.orbit.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />


       
        
    </head>
    <body>
  

<!--NAVIGATION -->


 


<?php include 'shoppingnav.php';?>



<!-- content area -->

<div class="home-wrapper">


   
  



<!--TWO COLUMN LAYOUT -->

<div class="row">

<!-- left -->

 <div class="columns large-8">

 <div class="row clearfix">  

<!--shopping cart -->
       
        
        <section>
          
            <a href="http://lindacom.infinityfreeapp.com/books/librarysearch.php"<button class="primary button" type="button">Continue shopping</button></a>
          
             <div>
              <h2>Cart</h2>
             
              </div>
<?php 
echo  "Number of Items in the cart = ".sizeof($_SESSION['cart'])." <br>";?>
                           <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="10%">Quantity</th> 
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
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

       <td>$ <?php echo $values["item_price"]; ?></td> 

       <!-- PRICE -->
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="store.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  

                          <!-- TOTAL -->
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table> 
                     </div>

                     <script>
                     // quantity input box
                     $('.input-number').click(function() {
 var set = $(this).val();
$(this).attr("value", set);

// var set = $('.input-number').val();
// $('.input-number').attr("value", set);
});
</script>

    <!-- <?php echo $sql; ?>    
 <?php 
echo  "Number of Items in the cart = ".sizeof($_SESSION['cart'])." <br>";?>

            <div class="row">
            <div class="columns large-4">
                <span>ITEM</span></div>
                <div class="columns large-4">
                                <span>PRICE</span></div>
                                <div class="columns large-4">
                <span>QUANTITY</span></div>
            </div>            
            <div>             
 <?php 
  // list cart items
while (list ($key, $val) = each ($_SESSION['cart'])) { 
echo "$val <br>"; 
}
?>            </div>          
          
            <div>
                <strong>Total</strong>
                <span>£0</span>
            </div> -->

           <!-- <button class="alert button btn-purchase" type="button" width="250px">Clear basket</button> ** clear basket button functionality not working ** -->
            <a href="http://lindacom.infinityfreeapp.com/books/checkout.php"<button class="success button" type="button" width="250px">PAYMENT</button></a>
        </section>



 

      </div>
      </div>

      <!-- right -->

      <!--  block grids -->  




       <div class="columns large-4">

    <div class="row">  

<div class="columns large-12">
<img src="../images/book.jpg">
       </div>

<div class="columns large-12">
     <a href="http://lindacom.infinityfreeapp.com/books/checkout.php"<button class="success button " type="button" width="500px">PAYMENT</button></a>
</div>

      </div>

     
</div>
</div>
</div> <!--END OF WRAPPER-->

<!--footer -->

               <div>
  
   
            <!--e commerce footer-->                        

         <?php include 'ecommerce-footer.php'?>

        <!--page footer-->
      
 <?php include 'footer.php'?>

</div> 
    </body>
</html>