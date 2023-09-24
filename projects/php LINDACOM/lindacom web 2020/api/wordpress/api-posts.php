

<!DOCTYPE html>
<html lang="en">

<head>
<title>Web Blog posts</title>
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

<script src="js/loadpost.ajax.js" defer></script>
<script src="js/jwt.js" defer></script>



<style>
.admin-quick-add {
	background-color: #DDD;
	padding: 15px;
	margin-bottom: 15px;
}

.admin-quick-add input,
.admin-quick-add textarea {
	width: 100%;
	border: none;
	padding: 10px;
	margin: 0 0 10px 0;
	box-sizing: border-box;
}
</style>
</head>
  
<body>

 <!--navigation --> 

  <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle="example-menu"></button>
  <div class="title-bar-title">Menu</div>
</div>

<div class="top-bar" id="example-menu">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text">Coaching blogs</li>
      <li><a href="http://lindacom.infinityfreeapp.com/">Return to main site</a></li>
     
      
    </ul>
  </div>
  <div class="top-bar-right">
    <ul class="menu">
    <li><a href="http://lindacom.infinityfreeapp.com/api-addpost.php">Add a post</a></li>
    <li><a href="http://lindacom.infinityfreeapp.com/api-reviewpost.php">Comments and reviews</a></li>
        
    <li><a href="http://lindacom.infinityfreeapp.com/api-login.php">Log in</a></li>
    
  
  <li><a href="http://lindacom.infinityfreeapp.com/api-admin.php">Admin</a></li>
      
    </ul>
  </div>
</div> 

<div class="home-wrapper">

<!-- TWO COLUMN LAYOUT -->

<div class="grid-x">

<!-- left -->

<!-- filter box -->

<div class="cell small-4">

<div class="product-filters fbox">

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

    <!-- category dropdown -->


    <h2>Filter by category</h2>
     <select name="category_list" id="category_list" class="form-control">
      <option value="">Select Category</option>
      <option value="Coaching">Coaching</option>
      <option value="Leadership">Leadership</option>     </select>

      <!-- search box-->
        <div class="sbox">
        <h2>Search</h2>
          <div class="form-group ">
            <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Search by title, author or category" >
          </div>
        </div>

    </ul>  
  </li>
  </ul> 
</div> <!-- end of filter box -->
<hr />
<div>
<ul>
<h2>To do:</h2>

 <p><strong>Landing page</strong></p>
 <li>display all posts  category </li>
 <li> GET a single post by id on clicking read more button using endpoint /posts/$post_ID	</li> 
 <li>display posts by category </li>  
<li>pagination </li>

<p><strong>Add a post page</strong></p> 
<li>CREATE a post using endpoint /posts/new</li>
<li>POST create a new using the endpoint category /categories/new	</li>

<p><strong>Comment and reviews page</strong></p> 
<li>POST like a post using the endpoint /posts/$post_ID/likes/new</li>
<li> GET a list of recent comments using the endpoint /comments</li>
<li>POST create a comment using the endpoint /posts/$post_ID/replies/new	 </li>

<p><strong>Login page</strong></p> 
<li>GET logged in user profile link using endpoint /me/settings/profile-links/</li>

<p><strong>Admin page</strong></p> 
<li>UPDATE a post </li>
<li>POST upload media /media/new</li>
<li>GET /batch/	Run several GET endpoints and return them as an array.</li>
</ul>


</div>

</div>

<!-- right -->


<div class="cell small-8">




<!-- LISTING OF POSTS -->
<h2>Coaching blog posts</h2>

<table id='results' class='stack'>

</table>

<!-- PAGINATION -->

                    
                    <ul class="pagination text-center" role="navigation" aria-label="Pagination" data-page="6" data-total="16"> 
 <li class="pagination-previous disabled">Previous<span class="show-for-sr">page</span></li>
 
 <li class="current"><span class="show-for-sr">You're on page</span> 1</li>
 
 <li><a href="#"class="page-link" data-page_number ="1" aria-label="Page 2">2</a></li>
 <li><a href="#" class="page-link" data-page_number ="3" aria-label="Page 3">3</a></li>
 <li><a href="#" class="page-link" data-page_number ="4" aria-label="Page 4">4</a></li>

 <li class="ellipsis" aria-hidden="true"></li>

 <li><a href="#" class="page-link" data-page_number ="12" aria-label="Page 12">12</a></li>
 <li><a href="#" class="page-link" data-page_number ="13" aria-label="Page 13">13</a></li>

 <li class="pagination-next"><a href="#" aria-label="Next page">Next <span class="show-for-sr">page</span></a></li>
</ul>

</div>
</div> <!-- end of two column layout -->
</div>

<!-- SCRIPTS -->


<script>

//  FUNCTIONS TO RUN ON PAGE LOAD - fetch posts, fetch categories

$( document ).ready(function() {
    myFetchPosts()
    load_categories()
    load_authors()

    }); //end of document ready function



// 1. LISTING OF POSTS - API call - reusable function
function myFetchPosts(page) {

    // start with page 1

var page = 1;

var $title = $('#title');
var $content = $('#content');
   
    // used a template literal to add the page parameter

    var api_url = `http://lindacom.infinityfreeapp.com/wordpress/wp-json/wp/v2/posts?per_page=1&page=${page}`;



    $.ajax({
            url: api_url,
            contentType: "application/json",
            dataType: 'json',
            success: function(response){
                var len = response.length;
                for(var i=0; i<len; i++){
                    var id = response[i].id;
                    var date = response[i].date_gmt;
                    var slug = response[i].slug;
                    var excerpt = response[i].excerpt.rendered;
                    var categories = response[i].categories;

                    var tr_str =
                     '<td>'+
                    '<div class="card" style="width: 300px;">' +
                     '<div class="card-divider">' + (i+1) + ' ' + slug + '</div>' +    
                    '<img src="http://lindacom.infinityfreeapp.com/images/model.jpg">' +
                    ' <div class="card-section">' +   
                     '<p>' + excerpt + '</p>' +
                     '<h4>' +  date + '</h4>' +
                     '<h4>' + 'Category:' + categories + '</h4>' +
                    
                    '<input type="button" value="read more">' + '</input>' +
                    ' </div>' +
                     '</div>'+
                       '</td>'           
                        ;

                    $("#results").append(tr_str);   

                    // increment page so the next time this is called it will fetch the next page
                page += 1;    

            } // end of for loop
           
                   } // end of success    

        
                   
    }); // end of ajax call
    
} // end of fetch posts function


    // call our function onload - remove this not sure if needed.
  //  myFetchPosts(page);

  // 2. list of categories

  function load_categories()
    {

        var api_url_cat = `http://lindacom.infinityfreeapp.com/wordpress/wp-json/wp/v2/categories`;

      $.ajax({
        url:api_url_cat,
          contentType: "application/json",
            dataType: 'json',
            success: function(response){
var len = response.length;
                for(var i=0; i<len; i++){
                    var name = response[i].name;
                    var tr_str =
                     '<li>'+                     
                     '<p>' + name + '</p>' +                    
                       '</li>'           
                        ;                  
       
          $('#dynamic_categories').append(tr_str);
        }
            }
      });
    }

    // 3. LIST AUTHORS

    
    function load_authors()
    {

        var api_url_authors =`http://lindacom.infinityfreeapp.com/wordpress/wp-json/wp/v2/users`;

      $.ajax({
        url:api_url_authors,
       dataType: 'json',
            success: function(response){
                var len = response.length;
                for(var i=0; i<len; i++){
                    var name = response[i].name;
                    var tr_str =
                     '<li>'+                     
                     '<p>' + name + '</p>' +                    
                       '</li>'           
                        ; 
          $('#dynamic_authors').append(tr_str);
        }
            }
      });
    }

    // category dropdown - needs amending to fetch posts by category not page

    $('#category_list').change(function(){
          var page = $(this).val();
// myFetchPosts(page)
    });

// fetch page from api with url parameters - GET request not working

function marked (page)     { // when page link is clicked send data as a parameter in url     
   location.hash = (page); //enter parameter as hash in the url      
      var page = 1;         
    var api_url_selectpage =`http://lindacom.infinityfreeapp.com/wordpress/wp-json/wp/v2/posts?page=${page}`;        
      
       $.ajax({
      url: 'api_url_selectpage', //send request to this api for the filter data
     contentType: 'application/json',
            dataType: 'json',
                       success: function(response){
                var len = response.length;
                for(var i=0; i<len; i++){
                    var id = response[i].id;
                    var date = response[i].date_gmt;
                    var slug = response[i].slug;
                    var excerpt = response[i].excerpt.rendered;
                    var categories = response[i].categories;
                    var tr_str =
                     '<td>'+
                    '<div class="card" style="width: 300px;">' +
                     '<div class="card-divider">' + (i+1) + ' ' + slug + '</div>' +    
                    '<img src="http://lindacom.infinityfreeapp.com/images/model.jpg">' +
                    ' <div class="card-section">' +   
                     '<p>' + excerpt + '</p>' +
                     '<h4>' +  date + '</h4>' +
                     '<h4>' + 'Category:' + categories + '</h4>' +
                    ' </div>' +
                     '</div>'+
                       '</td>'           
                        ;
                    $("#results").append(tr_str);     }
}           
        });        
  }

    // PAGINATION - HERE TEST PAGE NUMBER SCRIPTS - then for the pagination you need to create some way for the user to click a button for more or something like that and call this function and pass in what ever page you need to get

     $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
     // console.log(page) this works
     marked (page)
     });
    
    //EXAMPPLE ONE
    /*  someclickablebutton.addEventListener('click', function(event){
        myFetchPosts(page);
    }); */

/* EXAMPLE TWO
    var p1 = 1;
    var p2 = 2;
    var p2 = 3;
    var p2 = 4;
    var p2 = 5;

    document.getElementById("myBtn").addEventListener("click", function(event) {
  myFunction(p2);
});

function myFunction(a) {
  var page = a;
 myFetchPosts(page);
}*/

/*EXAMPLE THREE


    // $("#pagetwo").click(function(event){
    //    myFetchPosts(page);
   // });

    // on click add post*/


// SEARCH BOX - needs modifying currently working as enter id and results show page number
 $('#search_box').keyup(function(){
      var page = $('#search_box').val();
      myFetchPosts(page);
    });





 











 // WORDPRESS REST API REFERENCES
// dislay blogs

// add ?per_page=1 to url to specify how many results per page, ?offset=6 to specify start position of posts returned ?page=3 specify the page of results to return.

//X-WP-Total: the total number of records in the collection and X-WP-TotalPages: the total number of pages encompassing all available records

// ?order=asc order posts ascending ?orderby=date other options are “relevance,” “id,” “include,” “title,” and “slug”



 // var api_url = 'http://lindacom.infinityfreeapp.com/wordpress/wp-json/wp/v2/posts?per_page=1&page=${page}'
 



 
</script>
        
</body>
</html>