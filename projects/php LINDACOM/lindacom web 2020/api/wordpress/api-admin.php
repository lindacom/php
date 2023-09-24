<!DOCTYPE html>
<html lang="en">

<head>
<title>Blog admin</title>
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
    <li><a href="http://lindacom.infinityfreeapp.com/api-posts.php">View all posts</a></li>
    <li><a href="http://lindacom.infinityfreeapp.com/api-addpost.php">Add a post</a></li>
    <li><a href="http://lindacom.infinityfreeapp.com/api-reviewpost.php">Comments and reviews</a></li>
        
    <li><a href="http://lindacom.infinityfreeapp.com/api-login.php">Log in</a></li>
    
  
  <li><a href="http://lindacom.infinityfreeapp.com/api-admin.php">Admin</a></li>
      
    </ul>
  </div>
</div> 

<div class="home-wrapper">



  <!-- ADD A MEDIA FORM -->

<div class="main-column">
<div class="admin-quick-add">
  <h3>Add media</h3>
  
  <input type="text" id="title" name="title" placeholder="Title">
  <textarea id="content" name="content" placeholder="Content"></textarea>
  <select name="category_list" id="category_list" class="form-control">
      <option value="">Select Category</option>
      <option value="Coaching">Coaching</option>
      <option value="Leadership">Leadership</option>     </select>

  <button  id="quick-add-button" class="success button">Create Post</button>
  <button  id="quick-add-category" class="success button">Add a category</button>
</div>
</div>


        
</body>
</html>