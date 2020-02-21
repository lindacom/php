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

<!--QUERY DATABASE FOR BOOK LIKE THE SEARCH VALUE --> 

<?php

$stmt= "SELECT title, description FROM books WHERE title LIKE '%".$page_name."%' ";
$result = $connect->query($stmt);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " - title: " . $row["title"]. " " . $row["description"]. "<br>";
    }
} else {
    echo "0 results";
}
$connect->close();

?>
