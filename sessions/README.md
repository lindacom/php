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

