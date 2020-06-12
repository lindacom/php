// FORM

<form id="welcomeform" action="welcome.php" method="post">
  
  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      
      <div class="medium-12 cell">
        <label>Name:  </label>
         <input type="text" name="name" placeholder="enter your name" required>
       </div>
        <div class="medium-12 cell">

       <div class="button-group">
    <button class="small button" name="Send" type="submit">Submit</a><br>
    <button class="small button [success secondary alert]" name="reset" input type="reset">CLEAR FORM</a>
  </div>
     </div>
      </div>
</form>

// DISPLAY FORM INPUT IN WELCOME PAGE

<?php
echo $_POST['name'];
?>
