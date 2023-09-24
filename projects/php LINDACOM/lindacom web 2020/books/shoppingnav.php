 <?php
session_start();
?>

 <!--NAVIGATION -->

  <!--mobile  -->

  <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle="example-menu"></button>
  <div class="title-bar-title">Menu</div>
</div>

<!--large screen  -->
<div class="top-bar" id="example-menu">
  
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text">The book store</li>
      
         <li>
         <a href="http://lindacom.infinityfreeapp.com/books/library.php">Home</a><ul class="menu vertical">
   
    
    </li>       
                      </ul>
  </div>


  <div class="top-bar-right">
    <ul class="dropdown menu" data-dropdown-menu>
    
    <?php 
    if(isset($_SESSION['user_name'])) { 
        echo '<li>';
      echo 'Logged in as: &nbsp';
        echo $_SESSION['user_name'];
       echo ' </li>';
       
       echo '<li> <a href="#">My account</a>';
    echo '<ul class="menu vertical">';
   echo ' <li> <a href="#">My orders</a></li>';
    echo '</ul>';
   echo ' </li>';
    }else {
        echo '<li><a href="http://lindacom.infinityfreeapp.com/books/shoppinglogin.php">Sign in</a></li>';
    } 
    ?>
    
    
    

    <li> <a href="#">Orders</a></li>
    
    <li> <a href="http://lindacom.infinityfreeapp.com/books/reviewform2.php">Reviews</a></li>
   
   <?php if(isset($_SESSION['user_name'])) { 

        echo '<li> <a href="http://lindacom.infinityfreeapp.com/books/logout.php">Logout </a></li>';
        
    } ?>
   
    <li><a href="http://lindacom.infinityfreeapp.com/books/store.php" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Basket <span class="badge"> 0</span></a></li>
      
    </ul>
  </div>
</div> 


 