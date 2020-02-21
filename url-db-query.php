<!--INCLUDE FILE TO CONNECT TO THE DATABASE  --> 

<?php include 'dbConnect.php';?> 
 

    <!--GET BOOK TITLE FROM THE URL PARAMETER ?search= --> 

 <?php
      $page_name = $_GET["search"]; 
   
   //display on page
   echo "
      You searched for: $page_name
   ";

?>

<!--QUERY DATABASE FOR BOOK LIKE THE SEARCH VALUE AND DISPLAY ON PAGE --> 

<?php


//Read Query from books database

$stmt= "SELECT title, description, image, price FROM books WHERE title LIKE '%".$page_name."%' ";
$result = $connect->query($stmt);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        echo    '<div class="box">';
        echo    '<object data='.$row["image"].' width="50%"  class="group list-group-image">
    <img src="http://placehold.it/400x250/000/fff" width="50%"/>
  </object>';
   echo    '<h2>'.$row["title"].'</h2>';
 echo    '<h2>'.$row["description"].'</h2>';
    echo    '<a href="http://lindacom.infinityfreeapp.com/books/store.php?action=get&title='.$row["title"].'&price='.$row["price"].'&quantity=1 "target="_blank" class="button"><i class="fa fa-shopping-cart"></i>Buy</a>';
   echo    '</div>';
    }
} else {
    echo "0 results";
}
$connect->close();

?>
