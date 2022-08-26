PHP variables
====================
Strings can be stored in variables.  You can add two strings together using the dot operator e.g. <?php ech $description . $answer; ?>

Manipulating variables
----------------------------
to change to uppercase <?php echo strtoupper($city); ?>

PHP time
================
```
<?php
$day = date('l');
$time = date('H:i');
$hour = date('H');
?>

<p>Today is <?php echo $day; ?>. The time is now <?php echo $time; ?></p>

```

Time conditionals
--------------------------

```
<?php if ($hour > 5 && $hour <12) { ?>
<p>Good morning. </p>
<?php } elseif ($hour >=12 && $hour < 18) { ?>
<p>Good afternoon. </p>
<?php else ($hour >=18 && $hour < 23) { ?>
<p>Good evening</p>
<?php } ?>
```

PHP arrays
================
Input from form fields are saved as an array and rows in a database are also arrays.

Create an array (indexed array)
---------------------
You can create an array in two ways - either using the array keyword or using brackets.
```
$flowers = array('tulips', 'roses', 'daffodils') or $flowers = ['tulips', 'roses', 'daffodils']
```

Add items to an array
---------------------
```
$flowers[] = 'irises';
```

print the structure of all elements of an array
--------------------------------------------------
```
<pre>
<?php print_r($flowers); ?>
</pre>
```

display array as a comma seperated list
----------------------------------------

```
<?php echo implode (',' , $flowers); ?>
```

get specific element in an array
---------------------------------
```
<?php echo $flowers[3]; ?>
```
Loop through an array 
----------------------
Foreach loops are designed specifically to work with arrays.

```
<?php foreach ($flowers AS $flower) {
   echo '<li>' . $flower . '</li>';
   }
   ?>
```
Labelling array elements (associative array)
------------------------------
Instead of using keys you can assign a label to an array value. The advantage is that it is easier to select the element you want.

```

$features = array(
 'winter' => 'This is the cold season'
 );
 
 ```
 ```
 <?php echo $features['winter']; ?>
 ```
 To use an associative array in a double quoted string you need to wrap it in a pair of curly braces.
 ```
 <?php echo "The tagline for wintr is : {$fatures['winter']}"; ?>
 ```
 Display keys and values
 -------------------------
 ```
 <?php
 foreach ($features AS $key => $value) {
    echo "<p>The caption for the $key feature is: $value</p>";
    }
 ?>
 ```
 N.b. if you only want to display the key you do this in the same way and just ignore the value.
 
 Find if an element exists in an array
 --------------------------------------
 ```
 <?php
 $order = 'daffodils';
 if (in_array($order, $flowers)) {
     echo "<p>Yes, $order are in stock.</p>";
      } else {
         echo "<p>Sorry, o $order available.<p>";
}
?>
```

PHP forms
============
The $_POST variable uses the name attribute of form elements to create an array. This is a PHP superglobal array (formated automatically)

Check if variable has been set
------------------------------

```
<form method="post">
<p>
<input type="submit" name="order" id="order" value="Order">
<input type="hidden" name="price" id="price" value="3">
</p>
</form>

<pre>
<?php 
if (isset($_POST['order'])) {
  print_r($_POST)
  }
  ?>
```

N.b. use the get form method to return the input field data as a query string in the url. php automatically creates an associative array called get 
which uses the name attribute as they key for each array element of a form that has been submitted using the GET method.

Retrieve values from a URL's query string
-------------------------------------------

```
<form method="get">
<p>
<label for="searchterm">Find flowers:</label>
<input type="search" name="searchterm" id="searchterm">
<input type="submit" name="search" id="search" value="search">
</p>
</form>

<pre>
<?php 
if (isset($_GET['searchterm'])) { ?>
 <p>You searched for <?php echo $_GET['searchterm']; ?>.</p>
 <?php }
  ?>
```

N.b. the value is set even if it is empty.
