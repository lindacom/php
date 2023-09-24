<?php
//fetch.php
$connect = mysqli_connect("sql105.epizy.com", "epiz_21113631", "leader01", "epiz_21113631_books");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM books 
  WHERE title LIKE '%".$search."%'
  OR lastname LIKE '%".$search."%' 
  OR Category LIKE '%".$search."%' 
 
 ";
}
else
{
 $query = "
  SELECT * FROM books ORDER BY title
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
        <tr>
    <th>ID</th>
    <th>Book Title</th>
    <th>Author</th>
    <th>Category</th>
     <th>Price</th>
  </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
  

    <tr>
      <td>'.$row["id"].'</td>
      <td><a href="http://lindacom.infinityfreeapp.com/books/bookdetails.php?search='.$row["title"].' "> '.$row["title"].' </a></td>
     <td>'.$row["lastname"].'</td>
     <td>'.$row["category"].'</td>
      <td>£'.$row["price"].'</td>
         </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>