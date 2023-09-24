var express = require('express');
var app = express();


var execPHP = require('./execphp.js')();

execPHP.phpFolder = 'C:\\Users\\cex\\Desktop\\oopphpcarttsql\\';

// return static files - images 
app.use(express.static('public'));  
app.use('/images', express.static('images'));

// returns query parameters as json
app.get('/myproducts.php?*', function (request, response, next) {	
			// response.send(request.query);
						const url = require('url'); // built-in utility
		//	response.redirect(request.path)	

		// strips query parameters for url to access filename
			execPHP.parseFile(request.path,function(phpResult) {
				response.write(phpResult);
		response.end();
	
	});
});

// parse all php files
app.use('*.php',function(request,response,next) {
	execPHP.parseFile(request.originalUrl,function(phpResult) {
				response.write(phpResult);
		response.end();
	
	});
});

 
/*app.use('*.php',function(request,response,next) {	
			execPHP.parseFile(request.url,function(phpResult) {			
				  phpResult = request.originalUrl; // returns url with query string
				// request.query.title; // access property value of query parameter
			//	for (const key in request.query) {
			
				//	phpResult = phpResult + (key, request.query[key]); // returns [object and all values from qury parameter
				
			//	phpResult = phpResult + request.query[key]; // returns [object and all values from qury parameter
			
			//	phpResult = request.query[key]; // returns last value in url parameter
				//  }
							response.write(phpResult);
			response.end();
			
		});
	});*/

app.listen(3000, function () {
	console.log('Node server listening on port 3000!');
});