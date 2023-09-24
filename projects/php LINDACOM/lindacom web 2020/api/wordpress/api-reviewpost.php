

<!DOCTYPE html>
<html lang="en">

<head>
<title>Review posts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="http://lindacom.infinityfreeapp.com/css/app.scss">
   <link rel="stylesheet" type="text/css" href="http://lindacom.infinityfreeapp.com/css/modules.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/css/foundation.min.css">
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/foundation.min.js"></script> 
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/plugins/foundation.orbit.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />

<script src="js/jwt.js" defer></script>-->



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



<form name="loginform" id="loginform" style="display: none">
<h2>Login form</h2>
<p><strong>You must log in with valid credentials before you are able to submit a comment</p></strong>
<label for"uer_login">Username:
<input type="text" id="user_login" name="username" class="input" value="" placeholder="username"></label>

<label for"user_pass">Password:
  <input type="password" id="user_pass" name="pass" class="input" value="" placeholder="Title"></label>

  <button id="login_button" type="submit" class="success button"> Login</button>
  </form>
  
  




  <!-- ADD A REVIEW FORM -->
<form name="commentform" id="commentform" style="display: none">
<div class="main-column">
<div class="admin-quick-add">
  <h3>Add review</h3>
  
  <input type="text" id="author" name="author" placeholder="Username">
  <input type="text" id="post" name="post" placeholder="id of the post your are commenting on">
  <input type="text" id="title" name="title" placeholder="Title">
  <textarea id="content" name="content" placeholder="Content"></textarea>
  
  <input type="text" id="date" name="date" placeholder="Date">
 
  
  <select name="category_list" id="category_list" class="form-control">
      <option value="">Select Category</option>
         </select>

  <button  id="quick-add-button" class="success button">Submit a review</button>
  <div>
  <button id="logout" class="success button" style="display: none"> Logout</button>      

   </div>

</div>
</div>
</form>




<h2>Coaching blog comments</h2>

<!-- POST ID SELECT DROPDOWN -->

<P>Show comments by id</p>
<select name="comment_id_list" id="comment_id_list" class="form-control">
      <option value="">Select id</option>
         </select>


         <!-- POST DATE SELECT DROPDOWN -->

<P>Show comments before</p>
<select name="date_list" id="date_list" class="form-control">
<option value="">Select date</option>
         
         </select>

         <!-- LISTING OF COMMENTS -->

<div id='results'>

</div>

<h2>To do:</h2>
 
 <p><strong>Comment and reviews page</strong></p>

<li>POST create a comment using the endpoint /posts/$post_ID/replies/new	 </li>
<li>post id dropdown remove duplicates</li>
<li>display comments by date using dropdown - not working</li>
<li>pagination</li>


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

<!-- SCRIPTS -->


<script>

//  FUNCTIONS TO RUN ON PAGE LOAD - fetch comments

$( document ).ready(function() {
    load_categories()
    myFetchComments()
   
    }); //end of document ready function

  // 1. LOAD CATEGORIES INTO DROPDOWN IN THE ADD COMMENT FORM
  
    function load_categories()
    {

        var api_url_cat = `/wordpress/wp-json/wp/v2/categories`;
        target =  $('#category_list');
       

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
                      name +                    
                       '</li>'           
                        ;               
                         
           $('<option value="">' + tr_str + '</option>').appendTo(target); //add to category dropdown list
        }
            }
      });
    }



// 2. LISTING OF ALL COMMENTS - API call - reusable function

function myFetchComments(page) {
   
    // used a template literal to add the page parameter

    var api_url = `http://lindacom.infinityfreeapp.com/wordpress/wp-json/wp/v2/comments?per_page=3`;



    $.ajax({
            url: api_url,
            contentType: "application/json",
            dataType: 'json',
            success: function(response){
                var len = response.length;
               
                for(var i=0; i<len; i++){
                   var author = response[i].author_name;
                   var date = response[i].date;
                                      var post = response[i].post;
                    var content = response[i].content.rendered;

                    var tr_str =
                      '<p><strong>Author:</strong>' + author + '</p>' +
                      '<p><strong>Date:</strong>' + date + '</p>' +
                      '<p><strong>Comment for post number:</strong>' + post + '</p>' +
                     '<p>' + content + '</p>' +
                     '<hr />'
                               
                        ;

                         var tr_str_id =
                           '<option value=" '+ post +' ">'  + post +'</option>' ;       //uses value id to fetch the id of posts that have comments

                            var tr_str_date =
                           '<option value=" '+ date +' ">'  + date +'</option>' ;       //uses value date to fetch comments by date

                    $("#results").append(tr_str);  

                    $("#comment_id_list").append(tr_str_id); 

                    $("#date_list").append(tr_str_date); 

                    // increment page so the next time this is called it will fetch the next page
               // page += 1;    

            } // end of for loop
           
                   } // end of success    

        
                   
    }); // end of ajax call
    
} // end of fetch comments function



// 3a POST ID DROPDOWN ON CHANGE EVENT LISTENER

    $('#comment_id_list').on( 'change', function () {
          var id = $('#comment_id_list').val(); //takes post id from dropdown value property
         
            		            myFetchCommentsId(id) // sends id to the mtfetchCommentsId function

    });


   // 3b. FETCH COMMENTS BY POST ID

 function myFetchCommentsId(id) {

   var id = id;
   
    // used a template literal to add the page parameter

    var api_url = `http://lindacom.infinityfreeapp.com/wordpress/wp-json/wp/v2/comments?per_page=3&post=${id}`;



    $.ajax({
            url: api_url,
            contentType: "application/json",
            dataType: 'json',
            success: function(response){
                var len = response.length;
               for(var i=0; i<len; i++){
                   var author = response[i].author_name;
                   var date = response[i].date;
                   var post = response[i].post;
                    var content = response[i].content.rendered;

                    var tr_str =
                      '<p><strong>Author:</strong>' + author + '</p>' +
                      '<p><strong>Date:</strong>' + date + '</p>' +
                      '<p><strong>Comment for post number:</strong>' + post + '</p>' +
                     '<p>' + content + '</p>' +
                     '<hr />'
                               
                        ;

                    $("#results").empty().append(tr_str);   

                    // increment page so the next time this is called it will fetch the next page
                page += 1;    

            } // end of for loop
           
                   } // end of success    

        
                   
    }); // end of ajax call
    
} // end of fetch comments by post id function


// 4a COMMENTS BY DATE DROPDOWN ON CHANGE EVENT LISTENER

    $('#date_list').on( 'change', function () {
          var date = $('#date_list').val(); //takes post id from dropdown value property
         
            		            myFetchCommentsDated(date) // sends id to the mtfetchCommentsId function

    });

 // 4b. FETCH COMMENTS BY POST DATE

 function myFetchCommentsDated(date) {

   var date = date;
   
    // used a template literal to add the page parameter

    var api_url = `http://lindacom.infinityfreeapp.com/wordpress/wp-json/wp/v2/comments?after=${date}`;



    $.ajax({
            url: api_url,
            contentType: "application/json",
            dataType: 'json',
            success: function(response){
                var len = response.length;
               for(var i=0; i<len; i++){
                   var author = response[i].author_name;
                   var date = response[i].date;
                   var post = response[i].post;
                    var content = response[i].content.rendered;

                    var tr_str =
                      '<p><strong>Author:</strong>' + author + '</p>' +
                      '<p><strong>Date:</strong>' + date + '</p>' +
                      '<p><strong>Comment for post number:</strong>' + post + '</p>' +
                     '<p>' + content + '</p>' +
                     '<hr />'
                               
                        ;

                    $("#results").empty().append(tr_str);   

                    // increment page so the next time this is called it will fetch the next page
                page += 1;    

            } // end of for loop
           
                   } // end of success    

        
                   
    }); // end of ajax call
    
} // end of fetch comments by post id function


    
   
 
</script>

 
        

       
  
  
<script>

//N.b for some reason this script is not working in a separate js file

(function($) {
    const RESTROOT = 'http://lindacom.infinityfreeapp.com/wordpress/wp-json';
const $ENTRYTITLE = $('.post-title');
const $LOGIN = $('#loginform');
const $LOGOUT = $('#logout');
const $COMMENT = $('#commentform');


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
                  $COMMENT.toggle();
    })
  //  .fail(function(response) {
//console.error("REST error");
  //  })

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



})(jQuery);
</script>
<script>

function signout() {
    sessionStorage.removeItem('newToken');
    window.location.reload();
}
</script>
        
</body>
</html>