<?php  // tutorial http://www.webslesson.info/2016/03/ajax-live-data-search-using-jquery-php-mysql.html
// tutorial https://codepen.io/ajaypatelaj/pen/zIBjJ

$connect = mysqli_connect("sql105.epizy.com", "epiz_21113631", "leader01", "epiz_21113631_books");





$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM books
  WHERE firstname LIKE '%".$search."%'
  OR lastname LIKE '%".$search."%' 
  OR title LIKE '%".$search."%' 
OR filter LIKE '%".$search."%' 
  OR category LIKE '%".$search."%' 
 ";
}

else
{
 $query = "
 SELECT * FROM books ORDER BY id ASC

";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0) {
    
 $output .= '

 ';
 while ($row = mysqli_fetch_array($result))
 {
 
      
  

$output .= '

 
      <div class="box">


<a href="'.$row["url"].'?action=add&tag='.$row["tag"].'  " style="text-decoration : none; color : #000000;">
<object data='.$row["image"].' width="100%"  class="group list-group-image">
    <img src="http://placehold.it/400x250/000/fff" width="100%"/>
  </object>
   
  <h2 class="product-card-title"><a href="http://lindacom.infinityfreeapp.com/books/product/productdescription.php">'.$row["title"].'</a></h2>
  <span class="product-card-desc">'.$row["precis"].'</span>
  <span class="product-card-price">'.$row["price"].'</span><span class="product-card-sale">'.$row["price"].'</span></a>
     <a href="http://lindacom.infinityfreeapp.com/books/basket.php" class="button"><i class="fa fa-shopping-cart"></i>Add to cart</a>
   </div>





   
 







 



  
 
          
             

 

 






  


 ';
      
      
      
      
      
 

}


 echo $output;




}

   

else
{
 echo 'Data Not Found';
}

?>  