<!-- test login form input -->

<?php $usernameErr = $passwordErr = "";
$error = false;

if (empty($_POST["firstname"])) {
    $usernameErr = "Name is required";
    $error = true;
  } else {
    $username = test_input($_POST["username"]);
    // check if field contains only letters and spaces
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
  $usernameErr = "Only letters and white space allowed";
}
  }

if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
    $error = true;
  } else {
    $password = test_input($_POST["password"]);
    // check if field contains only letters and spaces
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
  $passwordErr = "Only letters and white space allowed";
}
  }

if($error == false){
  $_SESSION['username'] = $username;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Add posts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="http://lindacom.infinityfreeapp.com/css/app.scss">
   <link rel="stylesheet" type="text/css" href="http://lindacom.infinityfreeapp.com/css/modules.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/css/foundation.min.css">
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/foundation.min.js"></script> 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/plugins/foundation.orbit.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" /> -->

<!-- <script src="js/jwt.js" defer></script> -->



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

     <li><a href="http://lindacom.infinityfreeapp.com/api-posts.php">View all posts</a></li>
    <li><a href="http://lindacom.infinityfreeapp.com/api-addpost.php">Add a post</a></li>
    <li><a href="http://lindacom.infinityfreeapp.com/api-reviewpost.php">Comments and reviews</a></li>
        
    <li><a href="http://lindacom.infinityfreeapp.com/api-login.php">Log in</a></li>
    
  
  <li><a href="http://lindacom.infinityfreeapp.com/api-admin.php">Admin</a></li>
      
    </ul>
  </div>
</div> 

<div class="home-wrapper">

 <!-- LOGIN FORM -->



<form name="loginform" id="loginform" style="display: none" >
<h2>Login form</h2>
<p><strong>You must log in with valid credentials before you are able to submit a post.</p></strong>

<label for"uer_login">Username:<span class="error">* <?php echo $usernameErr;?></span> <!-- shows errors on the page -->
<input type="text" id="user_login" name="username" class="input" value="<?php echo $username;?>" placeholder="username"></label>

<label for"user_pass">Password:<span class="error">* <?php echo $passwordErr;?></span> <!-- shows errors on the page -->
  <input type="password" id="user_pass" name="pass" class="input" value="" placeholder="Title"></label>

  <button id="login_button" type="submit" class="success button"> Login</button>
  </form>
  
  



  <!-- ADD A POST FORM -->

<form name="addpostform" id="addpostform" style="display: none">
<div class="main-column">
<div class="admin-quick-add">
  <h3>Quick Add Post</h3>
    <input type="text" id="title" name="title" placeholder="Title">
  <textarea id="content" name="content" placeholder="Content"></textarea>
  
  <select name="categories" id="category_list" class="form-control"> <!--dynamic categories -->
      <option value="">Select Category</option>
        </select> 

  <button  id="quick-add-button" class="success button">Create Post</button>
  <button  id="quick-add-category" class="success button">Add a category</button>
  <div>
  <button id="logout" class="success button" style="display: none"> Logout</button>      

   </div>
</div>
</div>
</form>

 <!-- POST DATE SELECT DROPDOWN -->

<P>Show comments before</p>
<select name="date_list" id="date_list" class="form-control">
<option value="">Select date</option>
         
         </select>

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

</div>

<p>To do:</>
<li>Success message when post added</li>
<li> fix unable to post twice using same token or toggle form</li>
<li>format date</li>
<li>Display posts by date/month</li>
<li>pagination</li>

<!-- SCRIPTS -->


<script>

//  FUNCTIONS TO RUN ON PAGE LOAD - fetch posts, fetch categories

$( document ).ready(function() {
    myFetchPosts()
    load_categories()
    

    }); //end of document ready function



// 1. LISTING OF POSTS - API call - reusable function
function myFetchPosts(page) {

    // start with page 1

var page = 1;

   
    // used a template literal to add the page parameter

    var api_url = `http://lindacom.infinityfreeapp.com/wordpress/wp-json/wp/v2/posts?per_page=5&page=${page}`;



    $.ajax({
            url: api_url,
            contentType: "application/json",
            dataType: 'json',
            success: function(response){
                var len = response.length;
                
                for(var i=0; i<len; i++){
                    var id = response[i].id;
                   var date = new Date(response[i].date);
                   
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

                        var tr_str_date =
                           '<option value=" '+ date +' ">'  + date +'</option>' ;       //uses value date to fetch comments by date

                                       $("#date_list").append(tr_str_date);

                    $("#results").append(tr_str);   

                    // increment page so the next time this is called it will fetch the next page
                page += 1;    

            } // end of for loop
           
                   } // end of success    

        
                   
    }); // end of ajax call
   
    
} // end of fetch posts function



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
                for(var i=0; i < len; i++){
                    var slug = response[i].slug;

                    var tr_str =
                     '<option value=" '+ slug +' ">'  + slug +'</option>'          
                        ;                  
       
          $("#category_list").append(tr_str);
        }
            }
      });
    }

   
// POSTS BY DATE DROPDOWN ON CHANGE EVENT LISTENER

    $('#date_list').on( 'change', function () {
          var date = $('#date_list').val(); //takes post id from dropdown value property
         
            		            myFetchPostsDated(date) // sends id to the mtfetchCommentsId function

    });

    // LISTING OF POSTS BY DATE SELECTED - API call - reusable function
function myFetchPostsDated(date) {

    var date = date;

   
    // used a template literal to add the page parameter

    var api_url = `http://lindacom.infinityfreeapp.com/wordpress/wp-json/wp/v2/posts?per_page=5&?after=${date}`;



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

                    

                    $("#results").empty().append(tr_str);   

                    // increment page so the next time this is called it will fetch the next page
                page += 1;    

            } // end of for loop
           
                   } // end of success    

        
                   
    }); // end of ajax call
    
} // end of fetch posts function


    // PAGINATION - HERE TEST PAGE NUMBER SCRIPTS - then for the pagination you need to create some way for the user to click a button for more or something like that and call this function and pass in what ever page you need to get

     $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
     myFetchPosts(page) 
     
     });
 
</script>
        

       
  
  
<script>

// Toggle login form and logout button, get and clear authorisation token,  N.b for some reason this script is not working in a separate js file

(function($) {
    const RESTROOT = 'http://lindacom.infinityfreeapp.com/wordpress/wp-json';
$ENTRYTITLE = $('.post-title');
const $LOGIN = $('#loginform');
const $LOGOUT = $('#logout');
const $POST = $('#addpostform');



//Get token using username and password input and save in a session


function getToken(username, password) {


    $.ajax({
        url: RESTROOT + '/jwt-auth/v1/token',
method: 'POST',
data: {
    'username': username,
    'password': password

}
    })

    .done(function(response){
        sessionStorage.setItem('newToken', response.token); //sets the key and value in the console application > session storage
                $LOGIN.toggle();
        $LOGOUT.toggle();
         $POST.toggle();
         
    })
}

// clear token from session storage function

function clearToken() {
    sessionStorage.removeItem('newToken');
    $LOGIN.toggle();
    $LOGOUT.toggle();
}

// Reveal login form

$LOGIN.toggle();
$('#login_button').click(function(e) {
e.preventDefault();
let username = document.querySelector('#user_login').value;
let password = document.querySelector('#user_pass').value;

console.info('username: ' + username + 'password:' + password);
getToken(username, password);

});

//clear token from session when logout button clicked

$('#logout').click(clearToken);

// CREATE A POST

var title = document.querySelector('#title').value;
var content = document.querySelector('#content').value;


 $('#quick-add-button').click(function(e) {
     e.preventDefault();
 var title = document.querySelector('#title').value;
var content = document.querySelector('#content').value;
console.info('title: ' + title + 'content:' + content);
postPost(title, content)
});


function postPost(title, content) {
var title = title;
var content = content;

    $.ajax({
        url: 'http://lindacom.infinityfreeapp.com/wordpress/wp-json/wp/v2/posts',
method: 'POST',
headers: { "Authorization": 'Bearer ' + sessionStorage.getItem('newToken') }, 
data: {
    'title': title,
    'content': content,
    'status': 'publish'
},
       success: function(response) {
 
        // Save the post ID in case you need it for something
 
     // var myNewPostID = response.id;
     // console.info(myNewPostID);
     console.info('done')
        
 
    }
});

};


})(jQuery);



</script>



</body>
</html>