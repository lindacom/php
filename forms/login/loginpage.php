  <?php include 'dbConnect.php';?> 
  <?php include 'loginuser.php';?> 

<!DOCTYPE html>

<html lang="en">

<head>  
<title>Login form</title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="http://lindacom.infinityfreeapp.com/css/app.scss">
   <link rel="stylesheet" type="text/css" href="http://lindacom.infinityfreeapp.com/css/modules.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/css/foundation.min.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/foundation.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/plugins/foundation.orbit.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />
<style>
body {
    background-image: url("../images/coding.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    width: 100% !important;
    z-index: 0;
}

.login-width {
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
    

  
      

          <!-- MAIN SECTION -->

   

       <div class="home-wrapper">        
       
       <div class="row clearfix">
    

                                                   <!-- login form -->


		          	
		      
		    
        <div class="login-width">
      <span class="error"><?php echo $mainErr;?></span>
       <h2>Login Form</h2> 
                    <form role="form" method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="loginform">

                     <div class="loginsignup">
                     <label for="right-label" class="text-left"><strong>Username:</strong></label> 
                     </div> 
 
                  <div>
                  <input type="text" id="tbusername" name="txtuser" value="<?php echo $username;?>" placeholder="Username*">
                  <span class="error">* <?php echo $usernameErr;?></span>
                   </div>  
      

                  <div>
                 <label for="right-label" class="text-left"><strong>Password:</strong></label>
                 </div>
                                           
             <div>
            <input type="password" id="tbpassword" name="txtpass" value="<?php echo $password;?>" placeholder="Password*">
               <span class="error">* <?php echo $passwordErr;?></span>
              </div>

                                                                                                               
  
             <button class="button expanded" type="submit" name="Login" id="btn">Login</button>
    
     </form> 
     <div class="pull-left message" id="login-message"></div>

                      <p>Forgot <a id="forgot-password" href="#" data-open="passwordModal">Password?</a></p><br>     
           </div> 
      </div>                                                                                                       
                                                                                                               
<br>



<!-- forgotten login modal -->


               
    
        <div class="reveal" id="passwordModal" data-reveal>
        <p>Please enter your email address.  We will send you details on how to reset your password.</p>
  
       <form role="form" method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="pwresetform">

                                    <div>
                 <label for="right-label" class="text-left"><strong>Email:</strong></label>
                 </div>
                                           
             <div>
            <input type="email" id="tbemail" name="txtemail" value="<?php echo $email;?>" placeholder="Email*">
               <span class="error">* <?php echo $emailErr;?></span>
              </div>

                                                                                                               
   <button class="button" type="submit" name="Login" id="btn">Reset password</button>
            
    
     </form> 
  
   <button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span> </button>
 
        </div>
        
       <!-- <div class="reveal" id="passwordModal2" data-reveal>
  
  <h1>Awesome. I Have It.</h1>
  <p class="lead">Your couch. It is mine.</p>
  <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
  
  <button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span> </button>
 
        </div>-->



      

           
            
      </div> <!-- end of row -->
    
  </div> <!-- end of wrapper-->
 
    
     <!-- SCRIPTS-->  


     <script>
   $(document).ready(function() {
      $(document).foundation();
   })
</script> 

</body>
</html>
