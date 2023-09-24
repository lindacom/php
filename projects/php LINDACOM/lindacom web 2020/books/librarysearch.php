<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Live Data Search in PHP using Ajax</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://lindacom.infinityfreeapp.com/css/app.scss">
   <link rel="stylesheet" href="http://lindacom.infinityfreeapp.com/css/modules.scss">
    <link rel="stylesheet" type="text/css" href="http://lindacom.infinityfreeapp.com/css/productcard.scss">
     <link rel="stylesheet" type="text/css" href="http://lindacom.infinityfreeapp.com/css/footer.scss">
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.css">
     <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/plugins/foundation.orbit.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />

  </head>
  <body>

<?php include 'shoppingnav.php';?> 
<div class="home-wrapper">

<!-- COLUMNS -->
  
  <div class="row clearfix">

  <!-- left -->

  <div class="columns large-4">

<!-- search filter panel design -->

  <div class="product-filters" style="border-style: solid;">
  <ul class="mobile-product-filters vertical menu hide-for-small-only" data-accordion-menu>
   <li>
     <h2>Filter by</h2>  
     <ul class="vertical menu" data-accordion-menu>

     <!-- filter section -->
      <li class="product-filters-tab">
        <p>Category</p>
        <ul class="categories-menu menu vertical nested is-active">
           <a href="#" class="clear-all" id="category-clear-all" onClick="window.location.reload();">Clear All</a> 
           <li id="dynamic_categories"></li>
           
           </ul>
    </li>

             <!-- filter section -->
      <li class="product-filters-tab">
        <p>Authors</p>
        <ul class="categories-menu menu vertical nested is-active">
           <a href="#" class="clear-all" id="category-clear-all" onClick="window.location.reload();">Clear All</a> 
           <li id="dynamic_authors"></li>
           
           </ul>
    </li>

             <!-- filter section -->
      <li class="product-filters-tab">
        <p>Price</p>
        <ul class="categories-menu menu vertical nested is-active">
           <a href="#" class="clear-all" id="category-clear-all" onClick="window.location.reload();">Clear All</a> 
           <li id="dynamic_price"></li>

            <!-- price slider 
           <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65" />
                    <p id="price_show">5 - 65</p>
                    <div id="price_range"></div>-->

                    </ul>
    </li>

             <!-- filter section -->
      <li class="product-filters-tab">
        <p>Other filters</p>
        <ul class="categories-menu menu vertical nested is-active">
           <a href="#" class="clear-all" id="category-clear-all" onClick="window.location.reload();">Clear All</a> <br />
            <a href="#" id="featured">Featured</a><br />
           <a href="#" id="lowest-price">Lowest price</a>
          <div>  <a href="#" id="five-stars">Highest reviews</a>
            
   <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
                   </div>
           
</ul>
    </li>
  </ul>  
  </li>
  </ul> 
</div> <!-- end of search filter panel design -->

  
  
   
   
    
    
   
   </div>

<!-- right column-->

<div class="columns large-8">

    <div class="container">
      <h3 align="center">Library search</h3>
      <br />
      <div>
        <div><strong>Search results </strong><br>
        <!-- clock-->
        <?php
$hour = date("H:i:sa");
echo "Today is " . date("d/m/Y") . "<br>";
date_default_timezone_set("Europe/London");
echo "The time is " . $hour;

if ($hour > 5 && $hour <12) { ?>
<p>Good morning.</p>
<?php } elseif ($hour >=12 && $hour < 18) { ?>
<p>Good afternoon.</p>
<?php } else { ?>
<p>The library is closed.  Go home!</p>
<?php } 
?>


<!-- welcome message if loged in-->
 <?php 
    if(isset($_SESSION['user_name'])) { 
        echo 'Welcome &nbsp';
        echo $_SESSION['user_name'];
    }
    ?>

   


</div>

<!-- search box-->
        <div>
          <div class="form-group">
            <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Type your search query here" >
          </div>
        
            
          <div class="table-responsive" id="dynamic_content"></div>
         
        </div>
      </div>
    </div>

    </div>

    </div>




    </div> <!-- END OF HOME WRAPPER -->
  
<script>
// Scripts to run when page loads - product filter panel, list of books
  $(document).ready(function(){
load_data(1)
load_categorydata(1)
load_authorsdata(1)
load_pricedata(1)


    });

   // list of books 

    function load_data(page, query = '')
    {
         $.ajax({
        url:"fetchall.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    // search box
    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });

   

    // list of categories

  function load_categorydata(page, query = '')
    {
      $.ajax({
        url:"fetchcategories.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_categories').html(data);
        }
      });
    }

// list of authors
    function load_authorsdata(page, query = '')
    {
      $.ajax({
        url:"fetchauthors.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_authors').html(data);
        }
      });
    }
// list of book prices
    
    function load_pricedata(page, query = '')
    {
      $.ajax({
        url:"fetchpricerange.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_price').html(data);
        }
      });
    }
   
    </script>


   

    <!-- FILTER ON CLICK SCRIPTS -->

    <script>

// featured
 $("#featured").click(function(){
    $.ajax({
        url: "fetchfeatured.php",
        method: "POST",
        data: 'id=' + $(this).attr('value'),
        success: function(data){
            $("#dynamic_content").html(data);
        }
    });
});

// lowest price

 $("#lowest-price").click(function(){
    $.ajax({
        url: "fetchlowest.php",
        method: "POST",
        data: 'id=' + $(this).attr('value'),
        success: function(data){
            $("#dynamic_content").html(data);
        }
    });
});

// five stars
    $("#five-stars").click(function(){
    $.ajax({
        url: "fetchlikes.php",
        method: "POST",
        data: 'id=' + $(this).attr('value'),
        success: function(data){
            $("#dynamic_content").html(data);
        }
    });
});

</script>

<!-- PRODUCT FILTERS SCRIPTS -->

<!--ALERT WHEN CHECKBOX CHECKED - TRUE AND FALSE ARE INCORRECT BUT IT WORKS -->
<script>

   function marked (param1)     {
     
      location.hash = (param1);
      
      var filter = [];
        
        $(param1).each(function(){
            filter.push($(this));
            
            console.log (filter);
        });
        
   }
   </script>
  
    
     <!-- FILTER EVENT SCRIPTS FOR REFERENCE (NOT WORKING)

   function checked ( )     {

    var check = false;
    
if($('.category-clear-selection category').prop('checked') == true ){
    check = $('.category-clear-selection category').attr('id');
    
 } 

 $.ajax({
    type: "POST",
    url: "fetchmarked.php",
    data: { check:check},
    success: function(data) {
        alert(data);
    }
})
};



     if ($(this).is(':checked')) {
            alert("You have elected to show your checkout history."); //checked
        }
        else {
           alert("gone."); //unchecked
        
    }


// get value of one checked checkbox in the url
// location.hash = $("input[type='checkbox']").val();-->

    <!-- category click to search using search box not working 
<script>
function load_categoriesclick(page, query = '') {
    $("#Coaching").click(function(event){event.preventDefault(); load_data().val(page, query = 'Coaching').keyup(); });
    $('#Leadership').click(function(event){event.preventDefault();$('#search_box').val( "Leadership" ).focus().keyup();});
   
   };
   
   </script> -->

  <!--not working - if url shows featured get element clicked
   <script>  
 if(window.location.hash === "featured"){
document.getElementById("featured").click();
}   
</script> -->

<!-- not working change background color when a catetory is clicked
<script>
    function load_categoriesclick(page, query = '')
   {
  $(a).filter(".Coaching").css("background-color", "yellow");
});
</script> -->

<!-- not working ru function when category coaching is clicked
<script>
var el = document.getElementById('Coaching');
el.onclick = load_data();
</script> -->

<!-- THREE SCRIPTS - PRODUCT FILTER SCRIPTS EXAMPLE NOT working

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var ram = get_filter('ram');
        var storage = get_filter('storage');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    https://www.webslesson.info/2018/08/how-to-make-product-filter-in-php-using-ajax.html
</script>-->

</body>
</html>