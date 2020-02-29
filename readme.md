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

mysqli_fetch_array - returns both of the about but you can specify that you want one particular type (row or assoc) of aray

preventing sql injection
==========================

sanitize data

manual method - add backslash before single quotes
dynamic method - use mysqli_real_escape_string ($db, $string) only available when connected to the database.

