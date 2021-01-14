Browser sends request and receives a response from the server. This communication is stateless therefore it is impossible to store details uch as name or contents of a 
shopping cart.

Sessions and security
=========================

Cookies
--------
Cookeis preserve information across multiple requests.  The server responds with a cookie - a series of name value pairs and information to be preserved between requests. 
The browser stores this cookie. When a request to the server is made again, all cookie information is sent back to the server. 

Although it is possible to encrypt a cookie, it can still be intercepted.

session.cookie_lifetime - sets the lifetime of the cookie in seconds

PHP Session
=============
A session uses a combinaion of a cookie and server side storage.  The server responds with a unique token that identifies the session (sessionID).
A session can be stored as a cookie in the user's browser or passed through the url as part of a query string (however this is insecure - always use cookies 
to store the session ID.)When a request is made again, the session id is sent to the server.  All other information related to the session is stored on the 
web server in the temporary directory.  Only the session id gets passed back and forth.

Changing session defaults
--------------------------
run <?php php info(); ?> in a file.  Open the page in the browser to view session settings in the local value column.

N.b. Server settings can be changed in one of the following files php.ini file server settings (for apache server httpd.conf file or .htaccess file). .user.ini file.

In the .htaccess file to set a directive that uses a booean value set php_flag <directive name> on
  for non boolean directives use php_value <directive name> <value to set>
  e.g. php_value session.name mycart
  
Security
---------
If token presented twice, delete all users tokens.
require manual re-authentication for sensitive pages (e.g. account details, checkout page, change password page)
  
Inspecting stored sesion data
-------------------------------
N.b. chrome does not always delete session cookie whn the browser i closed so for testing in Google Chrome go to settings and turn clear all cookies and data when you 
quit chrome to on

Initialise a session
--------------------
Create a session - session_start();

You create session variables using the session super global array - for data that you want to be available throughout the session e.g. $_SESSION['authenticated'] = true;

N.b. if the data comes from user input, sanitise the data before storing as a session variable.

$_SESSION is a global array so it is available on any page that invokes session_start();

By default the cookie that stores the session id expires when the browser is closed, however the data is not automatically deleted at the same time.

N.b. php garbage collection runs periodically to remove out of date session data

N.b. delete session data that is no longer needed

Persisting session data
-----------------------
Persisting session data is useful for recognising return users. 

N.b persistent sessions should always use a connection over secure sockets layer (SSL) or transport layer security (TLS)

requirements for setting up persistent session:
1. Cookie remains active after browser closes - session data should be accessible from different devices and user should be able to log out
2. Session data is not garbage collected
3. Store data securely - use database rather than plain text files.

N.b. automatic login should be optional not default

Steps for setting up persistent session:

Set up database to store session data, auto login tokens and user credentials:

Create a database and user with insert, delete and update priviledges.

Create tables:

Users - user_key char(8) primary key, password varchar(255)
sessions - sid varchar(10) primary key, expiry int (10), data text
autologin - user_key char(8) primar key, token char(32) primary key, created timestamp, data text, used tinyint(1) default '0'

Connect to the database:

use PDO as it can b usd with any database
Use a try catch block bcause PDO throws an exception if the connection fails. If you don't catch the exception the error messae exposes your database crdentials
including password.

```
<?php
try {
$db = new PDO('mysql:host=localhost;dbname=database', 'user', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   $error = $e->getMessag();
   }
   
   if(isset($db) {
   echo 'connected';
   } elseif (isset($error)) {
   echo $error;
   } else {
   echo 'unknown error';
   }
```

1. Create new session when user logs in
2. Regenerate session id when authenticated
3. store session data and session id in the database

Steps:

1. Opening and reading session - start transaction (or apply advisory lock), read/write data, commit and close. N.b. database can either use transactions
or an advisory lock using getLock() method and initialise method.
2. Writing session data
3. Closing session and garbage collection
4. Destroy session

In a file:

1. Import session handler class
2. Require db connection file
3. require session handler definition file - Create a class that implements the session handler interface. N.b. locking chords when read or written to.
4. Define sesion handler methods = functions tell php what to do when session is opened, closed, read or written, how to destroy a session or garbage colect.
You can also define how to set session ID Pass these functions as arguments to session set_save_handler.
5. Create a new instance of session handler passing in db object as prametr
6. Pass the new instance to session_set_save_handler(); - this tells php to store session data in database.

7. If user wants to be remembered, generate single use token to identify user on return
8. Store the token in a cookie in the user's browser. N.b. this cookie is seperate from the session cookie and will have a longer lifetime.
9. store the token, date and user's data in the database
10. On return, check the token stored in the user's browser. If valid, import the user's data into a new session without the need to log in.

N.b. using same session id for a long period is insecure as the session can be stolen.

N.b. because the token is single use it's marked in the database as used.  A new token is generated and stored as a cookie in the user's browser. 
If no token is detected user is asked to login.

Increase value of session.cookie_lifetime and session.gc_maxlifetime

Use secure one time hash key as autologin key using cookie.

Using session handler
---------------------
Use php built in function session_set_save_handler

Seee documentation php.net/manual/en/function.session-set-save-handler.php

Tutorials
==========

PDO session handler - youtube.com/watch?v=5wZWyLE4xlc

