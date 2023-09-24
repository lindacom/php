<?php  

$connect = mysqli_connect("sql105.epizy.com", "epiz_21113631", "leader01", "epiz_21113631_books");





$output = '';

 $query = "
 SELECT * FROM books
 WHERE featured = 'featured'
 ;
  
     
   

";

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0) {
    
 $output .= '
 <table class="table table-striped table-bordered">
  <tr>
    <th>ID</th>
    <th>Book Title</th>
    <th>Category</th>
     <th>Price</th>
  </tr>

 ';
 while ($row = mysqli_fetch_array($result))
 {
 
      
  

$output .= '

 
     <tr>
       <td>'.$row["id"].'</td>
      <td><a href="http://lindacom.infinityfreeapp.com/books/bookdetails.php?search='.$row["title"].' ">'. $row['title'] .'</a></td>
          
          <td>'.$row["category"].'</td>
     <td>£'.$row["price"].'</td>
     </tr>       

 ';
      
      
      
      
      
 

}


 echo $output;




}

   

else
{
 echo 'There are currently no featured books';
}

?>  