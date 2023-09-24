<?php  // tutorial http://www.webslesson.info/2016/03/ajax-live-data-search-using-jquery-php-mysql.html
// tutorial https://codepen.io/ajaypatelaj/pen/zIBjJ


$connect = mysqli_connect("sql105.epizy.com", "epiz_21113631", "leader01", "epiz_21113631_books");





$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM books
  WHERE price LIKE '%".$search."%' 
  ORDER BY price ASC
 ";
}

else
{
 $query = "
 SELECT * FROM books 
 WHERE price < 20
 ORDER BY price ASC

";
}
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
 echo 'No books found within this price range';
}

?>  