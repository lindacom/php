<?php
session_start();
?>
<!-- signup connection to database and insert post values--> 
<?php
// define variables and set to empty values
include 'db.php';

$username = $email = $password = "";
$usernameErr = $usernameErr2 = $emailErr = $passwordErr2 = $passwordErr = $mainErr = "";

$usernamelength= strlen($username);
$passwordlength= strlen($password);


    if(isset($_POST['Signup'])) {
  
  if (empty($_POST["txtuser"])) {
    $usernameErr = "Name is required";
      } 
   else {
    $username = test_input($_POST["txtuser"]);
     // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed";
    }
    if ($usernamelength < 6){
     $usernameErr2 = "Username must be at least 6 characters";
}

  
  }

if (empty($_POST["txtemail"])) {
     $emailErr = "Email is required";
      } 
   else {
  $email = test_input($_POST["txtemail"]);
   // check if email is correctly formatted
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}
   }

  if (empty($_POST["txtpass"])) {
    $passwordErr = "password is required";
    } else {
    $password = test_input($_POST["txtpass"]);
     // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$password)) {
      $passwordErr = "Only letters and white space allowed";
    }
      if ($passwordlength < 6){
     $passwordErr2 = "Username must be at least 6 characters";
}
   
  }

  $username = $_POST['txtuser']; //txtuser is the name in the form field and keeps the value in the field
  $email = $_POST['txtemail']; //txtpass is the name in the form field
$password = $_POST['txtpass']; //txtpass is the name in the form field

 // first check the database to make sure 
  // a user does not already exist with the same username and/or email

$checkuser = "SELECT * FROM blogusers WHERE user_name='$username' OR user_email='$email' LIMIT 1";
  $result = mysqli_query($connect, $checkuser);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists   
      $mainErr = "User account already exists";   
  }

else {
  	$password = md5($password);//encrypt the password before saving in the database

      // TO DO: using stmt bind parameter here instead would be more secure
      
      	$checkuserin = "INSERT INTO blogusers (user_name, user_email, user_password) VALUES('$username', '$email', '$password')";
   
   if (mysqli_query($connect, $checkuserin)) {
        $mainErr = 'You have successfully created an account';
        	$_SESSION['user_name'] = $username;
  	  	header('location: index.php');
                                              		} else {
			$statusErr = 'ERROR: '. mysqli_error($connect);
                       
        }

}

   
 }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 checkuser($data);
}




?>


 
















 
 




