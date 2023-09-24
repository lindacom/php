<?php  

$connect = mysqli_connect("sql105.epizy.com", "epiz_21113631", "leader01", "epiz_21113631_books");

 $query = "
SELECT id, category,COUNT(*)
FROM books
GROUP BY category

";


$result =  mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0) {
    // output data of each row
   
   
     while ($row = mysqli_fetch_array($result)) {
        echo '
        
     <input class="category-clear-selection category"  
     type="checkbox" 
     id=" ' . $row['category'].' " 
     value=" ' . $row['category'] . ' "  
     onchange="marked(" hello")" 
      >
     <label for="category-checkbox1"> ' . $row['category'] . ' (' . $row['COUNT(*)'] . ')</label><br>
       
        
        
        
        ';
     
    }
} else {
    echo "No categories found";
}
$connect->close();
?>





