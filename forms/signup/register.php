<?php
session_start();
?>

<?php 
include 'articlesnav.php'; 
include 'registeruser.php'; 
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Register</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="/css/app.scss">
   <link rel="stylesheet" type="text/css" href="/css/modules.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/css/foundation.min.css">
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/foundation.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/plugins/foundation.orbit.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />
<style>
body {
    background-image: url("../images/monkey.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    width: 100% !important;
    z-index: 0;
}

.register-width {
    background: #fff;
    background-clip: padding-box;
    border: 10px solid rgba(12,13,13,.25);
    border-radius: 10px;
    margin: 20vh auto 10px;
    max-width: 425px;
    padding: 30px;
    width: auto;
}
</style>
</head>
<body>

 <!-- signup form -->	
<div class="register-width">
 			          <h2>Register for an account</h2> 
                                                   
		          <p> Open an account and be part of the Community  </p>

                   <span class="error"><?php echo $mainErr;?></span>

<form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="signupform" class="show-password">
<!--  <div class="loginsignup"> -->
<!--  <div class="form-icons"> -->
    
    <div class="grid-container">
    <div class="grid-x grid-padding-x">

   <div class="medium-12 cell">
   <span class="error"> <?php echo $usernameErr;?></span>
  <div class="input-group">
      <span class="input-group-label">
        <i class="fa fa-user"></i>
      </span>
      <input class="input-group-field" type="text" value="<?php echo $username;?>" placeholder="Full name" id="tbsuusername" name="txtuser" onblur="lowercaseFunction()" required>
          </div>
           
    </div>

    <div class="medium-12 cell">
    <span class="error"><?php echo $emailErr;?></span>
    <div class="input-group">
      <span class="input-group-label">
        <i class="fa fa-envelope"></i>
      </span>
      <input class="input-group-field" type="text" value="<?php echo $email;?>" placeholder="Email" id="tbsuemail" name="txtemail" onblur="lowercaseFunction()" required></div>
      
    </div>

 <div class="medium-12 cell">
 <span class="error"><?php echo $passwordErr;?></span>  
 <div class="input-group">
         <span class="input-group-label">
        <i class="fa fa-key"></i>
      </span>
      <input class="input-group-field password" type="password" value="<?php echo $password;?>" placeholder="create a new password" id="tbsupassword" name="txtpass" onblur="lowercaseFunction()" required></div>
         
    </div>
  
  
  <div class="medium-12 cell">
<button class="button expanded" type="submit" name="Signup" id="btn2" >Sign up</button>
</div>

</div>
</div>

</form>            
   

  </div> 

    
    
           <script>
   $(document).ready(function() {
      $(document).foundation();
   })
</script>
</body>
</html>

		
	
