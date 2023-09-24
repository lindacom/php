<?php

$connect = mysqli_connect("sql105.epizy.com", "epiz_21113631", "leader01", "epiz_21113631_books");



$output = '';

 $query = "
SELECT COUNT(likes), title
FROM likes
GROUP BY title
HAVING COUNT(likes) > 5

;
";


    /* result output - table formatting */

    $result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0) {
 $output = '

<table class="table table-striped table-bordered">
  <tr>
    <th>ID</th>
    <th>Book Title</th>
    <th>Category</th>
     <th>Price</th>
  </tr>

 ';

 /* if row data is greater than 0 produce output or enter no data found */
while ($row = mysqli_fetch_array($result))
 {

/* table row content */

$output .= ' 
      <tr>
       <td>'.$row["id"].'</td>
      <td><a href="http://lindacom.infinityfreeapp.com/books/bookdetails.php?search='.$row["title"].' ">'. $row['title'] .' ('. $row['COUNT(likes)'] .' likes)</a></td>
          
          <td>'.$row["category"].'</td>
     <td>'.$row["price"].'</td>
     </tr>
   
 ';

}
}
else
{
  $output .= '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}

 









echo $output;

?>