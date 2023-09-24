<!doctype html>
<html>
<head>
<title>Form with validation</title>
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
 <style>
         .error {color: #FF0000;}
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
   
   
   
   <body>

   <!--FORM VALIDATION-->

      <?php
         // define variables and set to empty values
         $nameErr = $emailErr = $age = $catErr = $dayErr = "";
         $name = $email = $age = $cat = $day = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }else {
               $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            
                   
            if (empty($_POST["age"])) {
               $ageErr = "Please enter your age";
            }else {
                //if age is > 18
               $age = test_input($_POST["age"]);
             
               // check if age is > 10 and < 18
               if ($_POST["age"] < 18 && $_POST["age"] >= 10) $ageErr = 'you are a little too young';
               //check if age is < 10
                if ($_POST["age"] < 10) $ageErr = 'I am telling your mum.';
            }

             if (empty($_POST["day"])) {
               $dayErr = "Please enter a day of the week";
            }else {
               $day = test_input($_POST["day"]);
               // check if day is between monday and friday
            }
            
            if (empty($_POST["cat"])) {
               $catErr = "Please enter a cat name";
            }else {
               $cat = test_input($_POST["cat"]);
               // check if cat name has five letters
               if(!preg_match('/^[a-zA-Z]{5,}$/', $_POST["cat"])) {
                $catErr = "five or more letters please";   
               }
            }
 if(!$dayErr) {
          header('Location:http://lindacom.infinityfreeapp.com/forms/welcome.php');
 }

         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>

      

      <div class="grid-container">
       <h2>Form with validation</h2>
     <p>Validation is used to ensure that data entered is sensible. There are a number of validation types - format check, length check, 
lookup, blank fields check, value between specified range.</p>
     <div class="grid-x">
  <div class="cell medium-6">
     
          
      <form method = "post" action = "<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
               Name:
               <input type = "text" name = "name" value="<?php echo $name;?>" placeholder="enter your name">
                  <span class = "error"><?php echo $nameErr;?></span>
              
              E-mail:<input type = "text" name = "email" value="<?php echo $email;?>" placeholder="enter your email">
                  <span class = "error"><?php echo $emailErr;?></span>

                   Age:<input type = "text" name = "age" value="<?php echo $age;?>" placeholder="you must be over 18">
                  <span class = "error"><?php echo $ageErr;?></span>

                    Gender:
                  <input type = "radio" name = "gender" value = "female">Female
                  <input type = "radio" name = "gender" value = "male">Male
                  <span class = "error"><?php echo $genderErr;?></span>

                   Cat name:<input type = "text" name = "cat" value="<?php echo $cat;?>" placeholder="enter a cat name containing five or more letters">
                  <span class = "error"><?php echo $catErr;?></span>

                  <!-- type="week" is not supported in Firefox, Safari or Internet Explorer 11 and earlier versions. -->

                  <label for="week">Select a week:</label>
  <input type="week" id="week" name="week">

                   <label for="month">Select a month:</label>
  <input type="month" id="month" name="month">

               <!-- STILL TO DO -->
               What day is it today? <input type = "text" name = "day" value="<?php echo $day;?>" placeholder="only monday to friday is accepted">
                  <span class = "error"><?php echo $dayErr;?></span>       
              
                  
               
               <input type = "submit" class="button" name = "submit" value = "Submit"> 
           
				<button class="button [success secondary alert]" name="reset" input type="reset">CLEAR FORM</a>
       
			
      </form>
      </div></div></div>

<script type="text/javascript" src="jquery-2.2.3.min.js"></script>

</body>
</html>