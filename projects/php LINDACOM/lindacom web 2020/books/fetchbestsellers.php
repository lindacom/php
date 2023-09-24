<?php

$connect = mysqli_connect("sql105.epizy.com", "epiz_21113631", "leader01", "epiz_21113631_books");



$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM books
  WHERE title LIKE '%".$search."%' 
 LIMIT 4
 ";
}

else
{
 $query = "
 SELECT *

FROM books 
LIMIT 4
";
}

    /* result output - flexbox formatting */

    $result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0) {
   
 $output = '

 

 ';

 /* if row data is greater than 0 produce output or enter no data found */
while ($row = mysqli_fetch_array($result))
 {

/* table row content */

$output .= ' 
<div class="box" > 

                   
                                       

               
  <a href="http://lindacom.infinityfreeapp.com/books/bookdetails.php?search='.$row["title"].'" title=""> <h4>'.$row["title"].'</h4> </a>
  <p>'.$row["firstname"].'&nbsp'.$row["lastname"].'</p> 

                    <div> 
   <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
                   </div>

       
         
     
   </div>




     
   
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