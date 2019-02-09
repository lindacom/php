<?php 
 // tutorial http://www.webslesson.info/2016/03/ajax-live-data-search-using-jquery-php-mysql.html
// tutorial https://codepen.io/ajaypatelaj/pen/zIBjJ
$connect = mysqli_connect("SERVER", "USERNAME", "PASSWORD", "DATABASE");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM blogs
  WHERE blogName LIKE '%".$search."%'
  OR monthFilter LIKE '%".$search."%' 
OR tag LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
 SELECT * FROM blogs ORDER BY blogID DESC LIMIT 20;
";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0) {
 $output .= '
<div>
     ';
 while ($row = mysqli_fetch_array($result))
 {
  $output .= '
<div>
<a href="'.$row["url"].'?action=add&tag='.$row["tag"].'  " style="text-decoration : none; color : #000000;">
<object data='.$row["image"].' width="100%"  class="group list-group-image">
    <img src="http://placehold.it/400x250/000/fff" width="100%"/>
  </object>
        <i class="number"><p>  '.$row["blogID"].'</p></i>
                   <h3>  '.$row["blogName"].'</h3>
                   <p  align="right"> <font color=”#800080″><i class="fa fa-tags" aria-hidden="true">  '.$row["tag"].'</i></font></p>
                   <p> '.$row["precis"].'</p>
<hr />
                    <p style="text-align:left;">'.$row["date"].'  <span style="float:right;"><strong>Likes:</strong>  '.$row["likes"].'</span></p>
                     
</a>
              <input type="hidden" name="hidden_name" value="'.$row["blogName"].'">
              <input type="hidden" name="hidden_price" value="'.$row["date"].'"><br />
      
 
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
