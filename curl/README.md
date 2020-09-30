CURL
====
Client URL (CURL) is a tool for:

1. transferring data to and from a server
2. making requests
3. testing REST APIs (an alternative to the postman tool)
4. downloading files

Setting up the environment
------------------------------
Linux operating system has CURL installed by default. 
For the Windows operating systems you can either download curl from https://curl.haxx.se/ or use git for Windows available from https://git-scm.com/. 

Gitbash is a unix based commandline tool (an alterntive to windows and powershell commandlines)

HTTP testing - REST API
========================

N.b you can use the Json Placeholder site for testing https:/jsonlaceholder.typicode.com

To test the WordPress API:

1. In a browser open the url edpoint e.g http://example.com/api/api-posts.php
2. From the start menu on your computer select Gitbash
3. In the commandline type $curl http://example.com/api/api-posts.php to view all posts

N.b. you can run $curl -i http://example.com/api/api-posts.php to get posts plus header information.
N.b. you can run $curl --head http://example.com/api/api-posts.php to get just the header information.

Get response and save to a file
-------------------------------
To save response data into a file:

1. In the commandline navigate to the required directory
2. Run the command $curl -o <filename> <url> to save the response to a file
3. To view the contents of the file run the command $ cat <filename>

Download the response as a file
-------------------------------

1. Navigate to the required directory
2. enter the command $ curl -O http://example.com/api/api-posts.php. A file called api-posts will be saved into the directory without an extension

Nb. you can also get the image url from the browser and download images from response in the same way. They will be saved with their extension.

N.b you can limit the download rate e.g. $ curl -O --limit-rate 1000B http://example.com/api/api-posts.php

API CRUD actions
------------

Add data
---------
$ curl --data "text" http://example.com/api/api-posts.php. You will get a response with the title, body and id of the created post

Update data
------------
$ curl -X PUT -d "text" http://example.com/api/api-posts.php?id=1

Delete data
-----------
$ curl -X DELETE http://example.com/api/api-posts.php?id=1

Secured routes
-------------
To authenticate hen a route requires a username and password enter the command $curl -u username:password http://example.com/api/api-posts.php

Redirected routes
-----------------
To follow a route that has ben redirected use the -L flag. e.g. $curl -L http://example.com/api/api-posts.php

FTP testing
==============

You can upload and download files to a server through file transfer protocol (FTP) using CURL.

Upload a file
-------------
1. enter $curl -u username:password -T <filename> ftp:<ftp url>

(e.g. curl -u username:password -T test.txt ftp://ftpupload.net/)

Download a file
----------------
You can download a file from the server using -O

$ curl -u username:password -O ftp://ftpupload.net/test.txt

PHP CURL
=========
To create a CURL request (get a page) in php:

1. In the php file initialise the resource
2. Load the php file in the browser.

Http site
---------

```
<?php 
$ curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://example.com');
curl_exec($curl);
```
https site
-----------
Use the above function for https url with additional SSL VERIFYPEER

```
<?php 
$ curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://example.com');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_exec($curl);
```

URL search parameters
----------------------
To manipulate search parametrs on a site

```
<?php
$curl = curl_init();
$search_string="books";
$url="https:www.example.com?search=$search_string";
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURTRANSFR, true);
$result=curl_exec($curl);
echo $result;
curl_close($curl);
```









