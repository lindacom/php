<?php  

$connect = mysqli_connect("sql105.epizy.com", "epiz_21113631", "leader01", "epiz_21113631_books");

 $query = "
 SELECT DISTINCT id, firstname, lastname 
 FROM books ORDER BY lastname ASC

";
$result =  mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0) {
    // output data of each row
   
     while ($row = mysqli_fetch_array($result)) {
        echo '
        
         
         
        <input class="category-clear-selection authors"  type="checkbox" value=" '.$row["lastname"].' " id=" '.$row["lastname"].' " onchange="marked(' . $row['id'] . ')">
        <label for="category-checkbox1">'.$row["firstname"].' '.$row["lastname"].'</label><br>
        
        
        
        ';
     
    }
} else {
    echo "0 results";
}
$connect->close();
?>





