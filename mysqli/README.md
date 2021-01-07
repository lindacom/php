PDO v mysqli
=============
PDO
1. Same code works with many database systems
2. Uses camel case for method names

Mysqli
1. Designed to work only with mysql and mariadb
2. Uses underscore in method names

Nb pdo driver for mysql is stable and maintained.

Santitising user input
=======================
e.g. search box input. Either use real_escape_string() method or use a prepared statement to protect against sql injection attacks.

Real escape string
------------------
e.g. $db->real_escape_string($_GET['searchterm']) . '%"';

Prepared statement
------------------
Easy to embed user input securely in select query using placeholders.

1. Initialise statement
2. Prepare statement using prepare() method
3. Bind values to the placeholders (e.g. in the where clause of a query) using bind_param() method of the statement object

The bind_param method accepts the following arguments:
A. String representing datatype of the string you are binding
B. values to be assigned to placeholders

N.b. they must be the same order and must be entered as variables not values.

4. Execute the statement using the execute() method
5. Get results using the get_results() method

Binding output variables:
You can bind results of each column to named variables using bind_results() method after the execute method

N.b. you must store result of num rows using the store_result() method before you are able to use the num rows property stmt->num_rows.

Mysqli queries
===============
A select query returns a mysqli result object. At all other times (e.g. insert or delete) it returns true or false.

The number of rows affected is stored as the affected_rows property of the database object.

When using an insert statement you can get the id of a new record that has been inserted using the insert_id property of the database object.

N.b. insert_id only works if the primary key is set to auto increment. 
N.b. if insert statment inserts multiple values it only returns the first one.

Query() v real_query()
----------------------
The query method executes the query and resutns a mysqli result object with the result set stored in php memory ready for use.

The real_query() method subites the query (only returns true or false). You need to retrieve the result set separately using the use_result() mthod on the database object.

N.b. real_query() is unbuffered meaning results sit on the server therefore you cannot find out how many rows are in the query.

Multiple queries
-----------------
1. Create queries sparated by ;
2. Submit query using multi_query() method on the database object
3. Create a do while loop

In the do condition store the result using the store_result() method. Free the memory associated with the rsult using the free() method

In the while condition check if there are any more results using the next_result() method on the database object

N.b. multi query method does not support prepared statements.

Transaction
--------------
A transaction allows you to treat a series of sql queries as a single unit that is executed only if all parts of it succeed.

1. Begin transation - set autocommit to false
2. Execute prepared statement
3. Check affected rows property

A. If it fails (1) roll back transaction using the database object
B. If it succeeds (0)continue and commit to complete transaction.

Remove dupicate field data from result table
---------------------------------------------
If database column fields have duplicate entries (e.g. make of car) then don't display the name again

```
<?php
$previous = '';
foreach ($db->query($cars) as $row) { ?>
<tr>
<?php if ($previous == $row['make']){
echo '<td>&nbsp;</td>;
} else { ?>
<td><?= $row['make']; ?> </td>
<?php } ?>
<td>$<?= $row['priceF'[; ?></td>
<td><?= $row['description']; ?></td>
</tr>
<?php $previous = $row['make'];
} ?>

```

Mysqli error messages
----------------------
Query method stored errors are stored in the database connection object.
Prepared statement method the statement object has its own error properties.


