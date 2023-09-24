
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome form</title>
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
</head>
<body>

<setion>
  
  <div class="login-width">
<h1>Welcome form</h1>
<p>Enter your details into this form and see your name displayed in a separate welcome page.</p>



<form id="welcomeform" action="welcome.php" method="post">
  
  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      
      <div class="medium-12 cell">
        <label>Name:  </label>
         <input type="text" name="name" placeholder="enter your name" required>
       </div>
     
      <div class="medium-12 cell">
        <label>E-mail:  </label>  
         <input type="text" placeholder="enter your email">
             </div>

       <div class="medium-12 cell">
      <label>Year of birth</label>
  <select>
  <option value>Select a date</option>
    <option value="1980">1980</option>
    <option value="1981">1981</option>
    <option value="1982">1982</option>
    <option value="1983">1983</option>
    <option value="1984">1984</option>
    <option value="1985">1985</option>
    <option value="1986">1986</option>
    <option value="1987">1987</option>
    <option value="1988">1988</option>
    <option value="1989">1989</option>
    <option value="1990">1990</option>
  </select>
    </div>
      
      <div class="medium-12 cell">

       <div class="button-group">
    <button class="small button" name="Send" type="submit">Submit</a><br>
    <button class="small button [success secondary alert]" name="reset" input type="reset">CLEAR FORM</a>
  </div>
  
 

     </div>
      </div>
</form>



</div>
</section>

  
  
  
</body>
</html>