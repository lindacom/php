<?php
// This is used for checking the input in the checkout form
// define variables and set to empty values

$firstnameErr = $emailErr = $addressErr = $postcodeErr = $cardnameErr =  $cardnumberErr = $expmonthErr = $expyearErr = $cvvErr = "";
$firstname = $email = $address = $city = $town = $postcode = $cardname =  $cardnumber = $expmonth = $expyear = $cvv = "";
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 

if (empty($_POST["firstname"])) {
    $firstnameErr = "Name is required";
    $error = true;
  } else {
    $firstname = test_input($_POST["firstname"]);
    // check if field contains only letters and spaces
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
  $firstnameErr = "Only letters and white space allowed";
}
  }

if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $error = true;
  } else {
    $email = test_input($_POST["email"]);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}
  }

  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
    $error = true;
  } else {
    $address = test_input($_POST["address"]);
  }

   $city = test_input($_POST["city"]);

   $town = test_input($_POST["town"]);
  
  if (empty($_POST["postcode"])) {
    $postcodeErr = "Postcode is required";
    $error = true;
  } else {
    $postcode = test_input($_POST["postcode"]);
  }

if (empty($_POST["cardname"])) {
    $cardnameErr = "Name on card is required";
    $error = true;
  } else {
    $cardname = test_input($_POST["cardname"]);
    // check if field contains only letters and spaces
    if (!preg_match("/^[a-zA-Z ]*$/",$cardname)) {
  $cardnameErr = "Only letters and white space allowed";
}
  
  }
 
  if (empty($_POST["cardnumber"])) {
    $cardnumberErr = "Card number is required";
    $error = true;
  } else {
    $cardnumer = test_input($_POST["cardnumber"]);
    
  }      
  
  if (empty($_POST["expmonth"])) {
    $expmonthErr = "Expiry month is required";
    $error = true;
  } else {
    $expmonth = test_input($_POST["expmonth"]);
  }
  
   if (empty($_POST["expyear"])) {
    $expyearErr = "Expiry year is required";
    $error = true;
  } else {
    $expyear = test_input($_POST["expyear"]);
     
  }
    
   if (empty($_POST["cvv"])) {
    $cvvErr = "CVV is required";
    $error = true;
  } else {
    $cvv = test_input($_POST["cvv"]);
   
  }

if($error == false){
  $_SESSION['firstname'] = $firstname;
  $_SESSION['email'] = $email;
  $_SESSION['address'] = $address;
  $_SESSION['city'] = $city;
  $_SESSION['town'] = $town;
  $_SESSION['postcode'] = $postcode;
  $_SESSION['cardname'] = $cardname;
  $_SESSION['cardnumber'] = $cardnumber;
  $_SESSION['expmonth'] = $expmonth;
  $_SESSION['expyear'] = $expyear;
  $_SESSION['cvv'] = $cvv;



         header("location: thankyou.php");
   
}
 

       
}


  

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 


?>

