// import required modules and configure api to use cors
var  Db = require('./dboperations');
var  Customer = require('./Customers');
var Product = require('./Products');

var  express = require('express');
var  bodyParser = require('body-parser');
var  app = express();
// For parsing application/json
app.use(bodyParser.json());
// For parsing application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended:  true }));

var  cors = require('cors');
var  router = express.Router();
app.use(cors());
app.use('/api', router);

//api to listen on port
var  port = process.env.PORT || 8090;
app.listen(port);
console.log('Customer API is runnning at ' + port);

// API ROUTES

// middleware
// this route will be called before any other routes, and you can put 
// authentication, authorization, logging operations here.
router.use((request, response, next) => {
    console.log('middleware');
     next();
  });

  // GET route
  // calls  getCustomers() method of dboperations module
  router.route('/customers').get((request, response) => {
    Db.getCustomers().then((data) => {
      response.json(data[0]);
    })
  })

   // GET route
  // calls  getProducts() method of dboperations module
  router.route('/products').get((request, response) => {
   Db.getProducts().then((data) => {
      response.json(data[0]);
      })
  })

  // calls  getProductName() method of dboperations module
  router.route('/products/:item').get((request, response) => {
    let item = request.params.item;
     //  if(!item) return response.status(404).send("product was not found");
    Db.getProductName(item).then((data) => {
            response.json(data[0]);  
       })
   })

    // calls  getProductCategory() method of dboperations module
  router.route('/products').get((request, response) => {
      let category = request.query.category;
     
    Db.getProductCategory(category).then((data) => {
            response.json(data[0]);  
       })
   })

   // calls  getProductName() method of dboperations module
  router.route('/products/:likesfilter').get((request, response) => {

    Db.getProductLikesfilter().then((data) => {
            response.json(data[0]);  
       })
     
   })

    // POST route - calls  addProduct() method of dboperations module
  router.route('/products').post((request, response) => {
    // TO DO - json is sent in the body of post request but is inserted as undefined in database
 let newp1 = request.body.productName;
let newp2= request.body.productUrl;
    let newp3 = request.body.price;
    let newp4 = request.body.likes;
    let newp5 = request.body.category;       
  
     Db.addProduct(newp1,newp2,newp3,newp4,newp5).then((data) => {
       response.json(data[0]);   
       })
   })

    // PUT route - calls  addProduct() method of dboperations module send body in request as application/json
  router.route('/products/:id').put((request, response) => {
    // TO DO - json is sent in the body of post request but is inserted as undefined in database
    let newpa = request.params.id;
 let newp1 = request.body.productName;
let newp2= request.body.productUrl;
    let newp3 = request.body.price;
    let newp4 = request.body.likes;
    let newp5 = request.body.category;       
  
     Db.updateProduct(newpa,newp1,newp2,newp3,newp4,newp5).then((data) => {
       response.json(data[0]);   
       })
   })

     // PATCH route - calls  addProduct() method of dboperations module. send body in request as application/json
  router.route('/products/:id').patch((request, response) => {
    
    let newpa = request.params.id;
 let newp1 = request.body.productName;
let newp2= request.body.productUrl;
    let newp3 = request.body.price;
    let newp4 = request.body.likes;
    let newp5 = request.body.category;       
  
     Db.editProduct(newpa,newp1,newp2,newp3,newp4,newp5).then((data) => {
       response.json(data[0]);   
       })
   })

    // DELETE route - calls  deleteProduct() method of dboperations module. send body in request as application/json
  router.route('/products/:id').delete((request, response) => {
    
    let newpa = request.params.id;
  
     Db.deleteProduct(newpa).then((data) => {
       response.json(data[0]);   
       });
   });