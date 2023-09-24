<script>
function check() {
    document.getElementById("myDIV").style.display = "block";
  document.getElementById('f1').innerHTML = document.selfform.name.value;
document.getElementById('f2').innerHTML = document.selfform.books.value;
document.getElementById('f3').innerHTML = document.selfform.gender.value;

  }
</script>

<!DOCTYPE HTML>  
<html lang="en">
<head>

  <title>Data return form</title>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="http://lindacom.infinityfreeapp.com/css/app.scss">
   <link rel="stylesheet" type="text/css" href="http://lindacom.infinityfreeapp.com/css/modules.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/css/foundation.min.css">
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/foundation.min.js"></script> 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />
<style>
#myDIV {
display:none;
}

#vertline {
     
    width: 1px;
    background-color: #cdcdcd;
    position: fixed;
    left: 50%;
    top: 0;
    bottom: 0;

}

@media only screen and (max-width: 600px) {

#vertline {
    display: none;
  
}
</style>

</head>
 <body>
 <!-- NAV -->

 <div class="top-bar">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text">Web Development Training Website</li>
      
      <li> <a href="http://lindacom.infinityfreeapp.com/forms.php">Forms menu</a></li>
      
    </ul>
  </div>

</div>
   <!--end of nav--> 

    <!--TWO COLUMN LAYOUT--> 
<div class="grid-container">
   <div class="grid-x grid-margin-x">

    <!--left--> 
  <div class="cell medium-6">
                                                                                                      
<h2>Data return form </h2>
<p>Enter your details and see the information returned within the same form</p>

<form name="selfform">     
        <label>Name:  </label>
          <input type="text" name="name" placeholder="enter your name">       
                                                                 
                                                               <label>
  What books did you read over summer break?</label>  <textarea placeholder="None" name="books"></textarea>                          
                              
                              
                          <fieldset>
    <legend>Gender</legend>
    <input type="radio" name="gender" value="Male" id="" required><label for="">Male</label>
    <input type="radio" name="gender" value="Female" id=""><label for="">Female</label>
    <input type="radio" name="gender" value="Prefer not to say" id=""><label for="">Prefer not to say</label>
  </fieldset>
                                                                                                   
     
          <div class="button-group">
    <button class="small button" type="submit" onclick='check(); return false'>Submit</a><br>
    <button class="small button [success secondary alert]" name="reset" input type="reset">CLEAR FORM</a>
  </div>
 
 

     
</form>

 </div>
 <div id="vertline"></div>

  <!--right --> 
  <div id="myDIV" class="cell small-6">

<h2>Your Input:</h2>
  
<p><strong>Name:</strong></p><p id='f1'></p>
<p><strong>What books did you read over summer break?:</strong></p><p id='f2'></p>
<p><strong>Gender:</strong></p><p id='f3'></p>


</div>

</div>
</div>

</body>
</html>