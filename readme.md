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

