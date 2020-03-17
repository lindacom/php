Validate form data
===================

Both GET and POST create an array (e.g. array( key1 => value1, key2 => value2, key3 => value3, ...)). 
This array holds key/value pairs, where keys are the names of the form controls and values are the input data from the user.

The htmlspecialchars() function converts special characters to HTML entities.This prevents attackers from exploiting the code by injecting HTML or Javascript code (Cross-site Scripting attacks) in forms.
sends the submitted form data to the page itself, instead of jumping to a different page. 
This way, the user will get error messages on the same page as the form.:

```
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

```

Required fields
===============

1. Define required fields with error message and prevent the form from emptying all the input fields when the user submits the form.
2. validate fields (name - letters only, email contains @ and .)

A. Write a php script to define empty variables for each input field and empty error variables for mandatory fields.
B. Include an if statement if ($_SERVER["REQUEST_METHOD"] == "POST") {
C. Include a statement that checks if field is empty then displays error 
```
if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  ```
 D. Write a test input function that checks the submitted data
 E. In the html form add a script to generate the error message
 
 <span class="error">* <?php echo $nameErr;?></span>
