<!DOCTYPE html>
<html lang="en">

<head>
<title>Shopping cart with TSQL queries</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="http://lindacom.infinityfreeapp.com/css/app.scss">
   <link rel="stylesheet" type="text/css" href="http://lindacom.infinityfreeapp.com/css/modules.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/css/foundation.min.css">
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/foundation.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/plugins/foundation.orbit.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />

<style>


.hero-section {
  background: url("https://static.pexels.com/photos/248064/pexels-photo-248064.jpeg") 50% no-repeat;
  background-size: cover;
  height: 60vh;
  text-align: center;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
}

.hero-section .hero-section-text {
  color: #fefefe;
  text-shadow: 1px 1px 2px #0a0a0a;
}


.divider-left::before {
    background-color: #00aeef;
    border: 2px solid #00aeef;
    border-radius: 10px;
    content: '';
    display: inline-block;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    width: 1px;
    z-index: 2;
}

.divider-left {
    position: relative;
    padding-left: 20px;
}

.article-box {
padding:20px 25px 50px 20px;
}

.article-content-left {
margin-top:50px;
}

.article-button {
border-radius: 5px 25px;
}

section.coloured {
    padding-top: 0.9375rem !important;
    padding-right: 0rem !important;
    padding-bottom: 1.875rem !important;
    padding-left: 0rem !important;
}

.coloured {
    background: #e4e7f2;
    color: #000;
}
</style>
</head>
  
<body>
            <!-- NAV -->

 <div class="top-bar" style="background-color: #F2F2F2;" role="navigation">
  <div class="top-bar-left">
    <ul style="background-color: #F2F2F2;" class="dropdown menu" data-dropdown-menu>
      <li class="menu-text">Shopping cart with TSQL queries</li>
      <li> <a href="queries/retrievedata.php">Retrieving, sorting and modifying data</a></li>
      <li><a href="queries/filterdata.php">Filtering data</a>  </li>
      <li> <a href="queries/filterdata.php">Grouping and aggregaging data</a></li>
      <li> <a href="#">Functions</a></li>
        
     <li> <a href="#">Table joins</a></li>
    </ul>
  </div>

</div>


         <div class="hero-section">
  <div class="hero-section-text">
    <h1>Shopping website</h1>
              <p role="main">Shopping cart functionality built using HTML, CSS, Javascript and AJAX, PHP and T-SQL skills and uses Foundation 6 framework.  
                </p>
              <a href="products.php" class="button article-button" style="background-color: #D8D8D8; color: #000000"><strong>Shopping website</strong></a> 
  </div>
</div>

<!--- INTERRUPT -->                
                            
                  <h2>T-SQL database queries</h2>   

                   
                      
                      <section class="coloured">
                                  
    

 <div class="grid-container">
       <div class="grid-x grid-margin-x grid-margin-y">
      
      <div class="cell large-6 card">   
         <div class="grid-y">
            
           <div class="cell"><a href="queries/retrievedata.php" style="text-decoration: none;">
            
<img class="card-img-top" alt="cart" src="images/coffee.jpg" header="Content-type: image/jpeg"> </div>
           <div class="cell-stretch card-body" style="padding:20px">
           <p>QUERIES</p>
<h2 class="card-title">Retrieving, sorting and modifying data</h2>
<p class="card-text"> 
<p>Use string concatination operator </p>
<p>create a table, insert, update and delete data (CRUD) </p>
<p>Using alias </p>
<p>Order of calculation - BODMAS </p>

</div></div></div></a>

  
        
        
        <div class="cell large-3 card">   
         <div class="grid-y">
           <div class="cell"><a href="queries/filterdata.php">
<img class="card-img-top" alt="bookshelf" src="./images/coffee.jpg"> </div>
           <div class="cell-stretch card-body" style="padding:20px">
           <p>QUERIES</p>
<h2 class="card-title">Filtering data</h2>
<p class="card-text"> <p>where clause</p>
<p>wildcards</p>

 <p>dates, null and range operators </p>

</div></div></div>  </a>

<div class="cell large-3 card">   
         <div class="grid-y">
           <div class="cell"><a href="queries/filterdata.php">
<img class="card-img-top" alt="login" src="./images/coffee.jpg"> </div>
           <div class="cell-stretch card-body" style="padding:20px">
           <p>QUERIES</p>
<h2 class="card-title">Grouping and aggregating data</h2>
<p class="card-text">Aggregate functions - summarises values (SUM, AVG, AX, MIN, COUNT) GROUP BY HAVING</p>
<p align="right"> </p>
</div></div></div></a>

<div class="cell large-3 card">   
         <div class="grid-y">
            
           <div class="cell"><a href="http://lindacom.infinityfreeapp.com" style="text-decoration: none;">
            
<img class="card-img-top" alt="shopping" src="./images/coffee.jpg"> </div>
           <div class="cell-stretch card-body" style="padding:20px">
           <p>QUERIES</p>
<h2 class="card-title">Functions</h2>
<p class="card-text">functions include:

sum, avg, max, min, coalesce, substring, left. There are different types of function:

text functions, date functions,
data conversion functions</p>

</div></div></div></a>

 <div class="cell large-3 card">   
         <div class="grid-y">
            
           <div class="cell"><a href="products.php" style="text-decoration: none;">
            
<img class="card-img-top" alt="cart" src="./images/coffee.jpg"> </div>
           <div class="cell-stretch card-body" style="padding:20px">
           <p>PROJECT</p>
<h2 class="card-title">OOP shopping cart</h2>
<p class="card-text">A listing of products retrieved from a database. Uses classes and object oriented programming design.</p>

</div></div></div></a>

<div class="cell large-6 card">   
         <div class="grid-y">
           <div class="cell"><a href="products.php">
<img class="card-img-top" alt="business" src="./images/coffee.jpg"> </div>
           <div class="cell-stretch card-body" style="padding:20px">
           <p>PROJECT</p>
<h2 class="card-title">OOP shopping cart</h2>
<p class="card-text">A listing of products retrieved from a database. Uses classes and object oriented programming design. </p>
<p align="right"></p>
</div></div></div> </a>


       
          
        
</div></div>


 </section>
 
          
        

  
 <script> $(document).foundation();</script>
 <footer>
 <?php 
 $startYear = 2017;
 $thisYear = date('Y');
 if ($thisYear > $startYear) {
     $thisYear = date('y');
     $dates = "@ $startYear&ndash;$thisYear";
 } else {
     $dates = $startYear;
 }
 echo $dates;
 ?>
 </footer>
 </body> 
</html>