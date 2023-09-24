<!-- THIS PAGE IS FOR TESTING ONLY BECAUSE IT USES SESSION STORAGE WHICH CLEARS WHEN EXITING THE BROWSER. -->

<!DOCTYPE html>
<html lang="en">

<head>
<title>Blog login </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="http://lindacom.infinityfreeapp.com/css/app.scss">
   <link rel="stylesheet" type="text/css" href="http://lindacom.infinityfreeapp.com/css/modules.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/css/foundation.min.css">
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/foundation.min.js"></script> 
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/plugins/foundation.orbit.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" /> -->


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

<h2>Login form</h2>

<form name="loginform" id="loginform" style="display: none">
<label for"uer_login">Username:
<input type="text" id="user_login" name="username" class="input" value="" placeholder="username"></label>

<label for"user_pass">Password:
  <input type="password" id="user_pass" name="pass" class="input" value="" placeholder="Title"></label>

  <button id="login_button" type="submit" class="success button"> Login</button>
  </form>
  
  <div>
  <button id="logout" class="success button" style="display: none"> Logout</button>
        

   </div>
  
  
<script>

//N.b for some reason this script is not working in a separate js file

(function($) {
    const RESTROOT = 'http://lindacom.infinityfreeapp.com/wordpress/wp-json';
const $ENTRYTITLE = $('.post-title');
const $LOGIN = $('#loginform');
const $LOGOUT = $('#logout');



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


        
</body>
</html>