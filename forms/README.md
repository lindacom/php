Form data
===================

Both GET and POST create an array (e.g. array( key1 => value1, key2 => value2, key3 => value3, ...)). 
This array holds key/value pairs, where keys are the names of the form controls and values are the input data from the user.

Use mysqli_real_escape_string to clean form input before inserting into a database.

Form buttons
=============
Reset button
         ```  
				<button class="button [success secondary alert]" name="reset" input type="reset">CLEAR FORM</a>
        ```

Submit button

```
        <input type = "submit" class="button" name = "submit" value = "Submit"> 
```

Form security
==============

The htmlspecialchars() function converts special characters to HTML entities.This prevents attackers from exploiting the code by injecting HTML or Javascript code (Cross-site Scripting attacks) in forms.

Php self sends the submitted form data to the page itself, instead of jumping to a different page. 
This way, the user will get error messages on the same page as the form.:

```
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

```

Password hashing
----------------

Using the php password hashing api

Set up database:
1. In the database set up a password column varchars(255). N.b. hashed password length is much longer than the original password so the field needs to be big

Create a form:
2. Create a form - encrypt the pasword using the password_hash() method - e.g. $encrypted = password_hash($_POST['password'], PASSWORD_DEFAULT);

Retrieve stored password from the database:
3. query the database - Select user where username matches

Test the retrieved pasword against the submitted password:
4. use password_verify() function to make sure password matches (returns true or false) - e.g. password_verify($submitted_pwd, $stored_pwd);
5. Store a session variable
6. redirect to previous page

Required fields
===============

To create a good user experience: 

1. Define required fields with error message and prevent the form from emptying all the input fields when the user submits the form.

```
   Name:
               <input type = "text" name = "name" value="<?php echo $name;?>" placeholder="enter your name">
                  <span class = "error"><?php echo $nameErr;?></span>
```
2. validate fields (name - letters only, email contains @ and .)

Form validation
================

In the html form add a script to generate the error message
 ```
 <span class="error">* <?php echo $nameErr;?></span>
```
A. Write a php script to define empty variables for each input field and empty error variables for mandatory fields.

```
  $nameErr = $emailErr = $age = $catErr = "";
         $name = $email = $age = $cat = "";
 ```
         
B. Begin writing an if statement 

```
if ($_SERVER["REQUEST_METHOD"] == "POST") {
```
C. Within the if statement write if statements that check if field is empty then displays error else it calls the test input function
```
if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  ```
 Check if email is well formatted
 
 ```
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
 ```
 
 Check if age is between 10 and 18
 ```
  if ($_POST["age"] < 18 && $_POST["age"] >= 10) $ageErr = 'you are a little too young';
  ```
 Check if input has at least five letters
 
 ```
 if(!preg_match('/^[a-zA-Z]{5,}$/', $_POST["cat"]))
 ```
 
 D. Write a test input function that checks the submitted data
 
 ```
   function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
         ```
 
