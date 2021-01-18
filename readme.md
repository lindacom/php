Displaying errors
=================
Put the following code at the top of the php file to display errors

```
 <?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?> 
```

Alerts
=======
echo '<script>alert("Item Already Added")</script>'; 

Working with dates
===================
Set future dates
----------------
Set a future date to store in the database e.g. membership expiry date

```
// date 12 months from today
$date = (new DateTime('+ 12 months'))->format('Y-m-d');
```
```
// last day of the month 12 months from today
$date = (new DateTime('last day of this month + 12 months'))->format('Y-m-d');

$date = (new DateTime('second Monday of October 2020'))->format('Y-m-d');

echo $date;
```

```
 <?php
$hour = date("H:i:sa"); // set the time (hour, minues, seconds, am/pm) as variable
echo "Today is " . date("d/m/Y") . "<br>"; // date, month, year separated by /
date_default_timezone_set("Europe/London");
echo "The time is " . $hour;

// if the time is after 5am and before 12pm, else if time after 12pm and before 6pm else another statemet
if ($hour > 5 && $hour <12) { ?>
<p>Good morning.</p>
<?php } elseif ($hour >=12 && $hour < 18) { ?>
<p>Good afternoon.</p>
<?php } else { ?>
<p>The library is closed.  Go home!</p>
<?php } 
?>
```

Two days from today
```<?php $date = strtotime("+2 day");
echo date('D M d Y', $date);?>
```

Working with time
===================
Find whether date is more than six months old

$date = '';
$now = nw DateTime();

if ($date->diff($now)->days > 182) {
}

Working with numbers
====================
Get the average using php built in function
```
function average ($vals) {
// get the arguments as an array
$vals = func_get_args();
// get the nuber of argumets
$count = func_num_args();
// calculate the average to one decimal point
return round(array_sum($vals)/$count, 1);
}

echo average(2, 4, 6, 8);
```

Generate a random number between two sets of numbers

```
<?php echo random_int(1, 50); ?>
```

Working with files
===================

Get filename
--------------
Get part of filename (e.g. colour) ad display on a webpage

$filename = 01_flower_green.jpg

```
function getColor($filename) {
// separate filename by _ symbol
$parts - explode ('_', $filename);
// return position three and format first letter in uppercase
return ucfirst($parts[2]);
```

To display part of the filename

```
if (isset($color[$flowername])) {
echo getColor($color[$flowername])
}
```
List files in a directory
-------------------------

```
$files = scandir('files'):
$now = new DateTime();

foreach ($files as $file) {
$modified = new DateTime('@' .$file->getMTime())
echo $file . ': ' .$modified->format('F j, Y;) . '<br>';
}
```

N.b instead of using scandir you could use new FilesystemIterator which returns the full file path and returns the result as a string object. use $file->getFilename() to get 
just the filename without the path.

Arrays and loops
================
e.g. data submitted from a form is displayed as an array.

Create an array
---------------
To create an indexed array;
$flowers = array('tulips', 'roses', 'daffodils', 'orchids');

To create an associative array (key and value):
$features = array(
   'winter' => 'it's winter',
   'spring' => 'it's spring',
   'summer' => 'it's summer'
   );

Php does not autoatically convert arrays to strings.  You need to use the implode() passing in two arguments - seperator and array name.

<?php echo implode (', ', $flowers); ?>

Loop through array
--------------------

Use for each loop to loop through items in an array.

foreach($flowers AS $flower) {
echo '<li>' . $flower . '</li>'
}

To omit an item from the loop use an if statement in the for each loop and continue

if ($flower == 'daffodils') {
continue;
}

Loop through associative array
-------------------------------

Display values:
foreach($features AS $feature) {
echo '<p>$feature</p>';
}

Display key and value
foreach($features AS $key => $value) {
echo '<p>$key $value</p>'
}

Find an element in an array
-----------------------------

Use the in_array() passing in variabl and array

$order = 'daffodils';
if (in_array($order, $flowers)) {

}

Display default image if no image exists in db
==============================================

        <object data='.$row["image"].' width="250px" class="group list-group-image">
    <img src="http://placehold.it/400x250/000/fff" width="250px"/>
  </object>

Using Modulo to display database item equally on page
=====================================================

e.g. finding every fourth item. Using modulo division to establish a repeating series e.g. total items are diisible y four. When loop runs the first time the counter
is zero. Increase the counter after every loop

1. Set counter to 0
2. Begin loop - if counter divisible by 4 =0 add block of code
increase the counter by one
if counter is divisible by 4 = 0 add closing tags

```
<?php
$number = 5;
?>

<?php if ($number %4 === 0 ) {
echo "$number is zero or equally divisible by 4";
$number ++;
if ($number % 4 === 0) {
?>

</ul>
</div>

<?php 
}
?>

} else {
echo "number is not equally divisable by 4";
}
?>
```

N.b. conter will only be divisable by four at the end of the forth loop

The advantabe of using this ethod is that it allows you to perform one operation at the beginning of the sequenc and a different one at the end.


VALIDATING DATA (E.G. FORMS)
============================

Always check that a value isset before using it

urls and headers
===================

When working with dynamic content (i.e. content that comes from a database or form submissions) remember the following

url encode - for adding %20 to spaces in the url

special chars - to stop script injection in urls from hackers

header location - for redirects

Queries
=========

mysqli_fetch_row - brings back data as an array

mysqli_fetch_assoc - brings back data as an associative array (brings back labels so you can use column names as keys). 
N.b. this method is a bit slower than the fetch row method

mysqli_fetch_array - returns both of the about but you can specify that you want one particular type (row or assoc) of array

Preventing sql injection
==========================

Sanitize data

manual method - add backslash before single quotes
dynamic method - use mysqli_real_escape_string ($db, $string) only available when connected to the database.

Random token
-------------
generate 32 character random token.  N. string is always twice the length of bytes specified in random_bytes

<?php echo bin2hex(random_bytes(16))?>

Using php database class
====================
Use a database class that can be reused when inserting, updating or deleting data in a database table.

Display username from session
=============================

```
 <?php 
    if(isset($_SESSION['user_name'])) { 
        echo 'Welcome &nbsp';
        echo $_SESSION['user_name'];
    }
    ?>
```

