<?php
session_start();
?>

<?php include 'dbConnect.php';?> 
<?php include 'shoppingnav.php';?> 
<?php include 'loginuser.php';?> 



<!DOCTYPE html>

<html lang="en">

<head>
  
<title>Login and sign up form</title>
  
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/plugins/foundation.orbit.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />

 
 
<style>
.error {color: #FF0000;}
</style>
 
 

</head>
  <body>
    
  
      

          <!-- MAIN SECTION -->

   

       <div class="home-wrapper">
       <div class="row clearfix">

       <!-- login form -->
      
     <div class="columns large-6">			    
		          <h2>Login</h2>
		    		<p> Log in to purchase books.</p> 
		      
		    
        <div>
       <form role="form" method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="loginform">
<label for="right-label" class="text-left"><strong>Username:</strong></label> </div> 
 
 <div>
    <input type="text" id="tbusername" name="txtuser" value="<?php echo $username;?>" placeholder="Username*">
    <span class="error">* <?php echo $usernameErr;?></span>
    </div>  
      

<div>
<label for="right-label" class="text-left"><strong>Password:</strong></label></div>
                                           
    <div>
<input type="password" id="tbpassword" name="txtpass" value="<?php echo $password;?>" placeholder="Password*">
<span class="error">* <?php echo $passwordErr;?></span>
</div>

                                                                                                               
  
    <button class="button expanded" type="submit" name="Login" id="btn">Login</button>
   
     </form>                                                                                                        
                                                                                                               
<br>



<!-- forgotten login modal -->
<div class="pull-left message" id="login-message"></div>

           <p>Forgot <a id="forgot-password" href="#">Password?</a></p><br>
  
       
           </div>
           
       <!-- signup connection to database and insert post values--> 
        
    <?php

  if(isset($_POST['Signup']))
{
  

    $sql = "INSERT INTO tbl_customer (CustomerName, email, password)
    VALUES ('".$_POST["txtsuuser"]."','".$_POST["txtsuemail"]."','".$_POST["txtsupassword"]."')";

    $result = mysqli_query($connect,$sql);
    
}

?>      

		
	
 <!-- signup form -->	
<div class="columns large-6">
 			          <h2>Register for an account</h2>                              
		          <p> Open an account and be part of the Community  </p>
		      
		     
		     <div>
 

<form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="signupform">
  
  <div class="form-icons">
    
    <div class="input-group">
      <span class="input-group-label">
        <i class="fa fa-user"></i>
      </span>
      <input class="input-group-field" type="text" placeholder="Full name" id="tbsuusername" name="txtsuuser" onblur="myFunction()">
    </div>

    <div class="input-group">
      <span class="input-group-label">
        <i class="fa fa-envelope"></i>
      </span>
      <input class="input-group-field" type="text" placeholder="Email" id="tbsuemail" name="txtsuemail" onblur="myFunction()">
    </div>

    <div class="input-group">
      <span class="input-group-label">
        <i class="fa fa-key"></i>
      </span>
      <input class="input-group-field" type="password" placeholder="create a new password" id="tbsupassword" name="txtsupassword" onblur="myFunction()">
    </div>
  
  </div>

 
<button class="button expanded" type="submit" name="Signup" id="btn2" >Sign up</button>
</form>



             
            
      </div> <!-- end of row -->
      


 
  
  </div> <!-- end of wrapper-->

      
    
      
      
     <script>
function myFunction() {
  var x = document.getElementById("tbsuusername");
  x.value = x.value.toLowerCase();

var y = document.getElementById("tbsuemail");
y.value = y.value.toLowerCase();

var z = document.getElementById("tbsupassword");
z.value = z.value.toLowerCase();
}
</script> 


<script>
$("#forgot-password").click(function(){
    $("#forgot-password-modal").modal();
});
</script>








</body>
</html>