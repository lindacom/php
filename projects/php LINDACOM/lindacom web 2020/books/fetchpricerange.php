<?php  // tutorial http://www.webslesson.info/2016/03/ajax-live-data-search-using-jquery-php-mysql.html
// tutorial https://codepen.io/ajaypatelaj/pen/zIBjJ


$connect = mysqli_connect("sql105.epizy.com", "epiz_21113631", "leader01", "epiz_21113631_books");





$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT DISTINCT id, price FROM books
  WHERE price LIKE '%".$search."%' 
  ORDER BY price ASC
 ";
}

else
{
 $query = "
 SELECT DISTINCT id, price FROM books ORDER BY price ASC

";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0) {
 $output .= '
	
    
    
 ';
 while ($row = mysqli_fetch_array($result))
 {
  $output .= '
  



<input class="category-clear-selection price"  type="checkbox" value=" '.$row["price"].' " id=" '.$row["price"].' " onchange="marked(' . $row['id'] . ')">
<label for="category-checkbox1">'.$row["price"].'</label><br>


	
  

  ';

 }


 echo $output;




}

   

else
{
 echo 'No books found within this price range';
}

?>  