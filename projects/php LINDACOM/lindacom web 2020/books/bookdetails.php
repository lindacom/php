 <?php 
 session_start();
 
 include 'dbConnect.php';
 
 ?> 

 <!DOCTYPE html>

<html lang="en">

<head>
  
<title>Book details</title>
  
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

   <?php include 'shoppingnav.php';?>

 

  

    <!--main content section  --> 

     
    
    
 <section class="notcoloured">
                             
	 <h2>Book details</h2>

         



    <h3> <?php
   // get book title from url  
   $page_name = $_GET["search"]; 
   

   //put the data together and echo
   echo "
      You searched for: $page_name
      
   ";

?></h3>

<p>Here are books related to your search.  If there are no books listed please return to the book store and search again.</p>
</section>



<section class="notcoloured">


<?php



//Read Query from books database and dislay on the page using php echo



$stmt= "SELECT title, description, image, price FROM books WHERE title LIKE '%".$page_name."%' ";


$result = $connect->query($stmt);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        echo    '<div class="row">';


        echo    '<div class="columns large-6">';
        echo    '<object data='.$row["image"].' >
    <img src="http://placehold.it/400x250/000/fff" />
  </object>';
  echo    '</div>';
  

  echo    '<div class="columns large-6">';
         echo    '<h3>'.$row["title"].'</h3>';
 echo    '<p>'.$row["description"].'</p>';
 
 echo '<div class="button-group">';

    echo    '<a href="http://lindacom.infinityfreeapp.com/books/store.php?action=get&title='.$row["title"].'&price='.$row["price"].'&quantity=1 "target="_blank" class="button"><i class="fa fa-shopping-cart"></i>Buy this book</a>';

echo '<a class="button success favourte-button">Favourite this book</a>';
echo '<a class="button secondary">Review this book</a>';

 echo    '</div>'; 
     echo    '</div>';
       echo    '</div>';
     
     
  
    echo    '<hr />';
    }
} else {
    echo "0 results";
}
$connect->close();

?>



 

            

   

<!-- FAVOURITES SCRIPT (not working)
  
     <script>
     favourites = [];
if (!isset($_SESSION['favourites']) {
    $session['favourites'] = [];
} 
</script>  -->
      



                           
            <!--e commerce footer-->                        

          <?php include 'ecommerce-footer.php';?>

        <!--page footer-->
      
 <?php include 'footer.php';?>

  	
     	                          
 
    
      <script>
      $(document).foundation();  </script> 
 
          </body>
  </html>