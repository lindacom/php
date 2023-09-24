let chai = require('chai');
let chaiHttp = require('chai-http');
//let server = '..api/api.js';
let server = 'http://localhost:8090';
chai.should();
chai.use(chaiHttp);
import { assert, expect, should } from 'chai';
import Allproducts, { createTestProduct, getAllProducts, getProduct, addStars, increaseQuantity, decreaseQuantity, addToCart, totalize } from './solutioncode';

require('isomorphic-fetch'); // enables the use of javascript fetch api

// writing tests: arrange - what we need to do test, act - do, assert - results match as expect
// chi assertions assert, expect, should

// test to display all products from an api
// “done” parameter, when present in your callback function, tells Mocha that you are writing an asynchronous test.
// waiting for the async function to finish – which is facilitated by either calling the `done()` function
describe("Products API", () => {

describe("GET /api/products", () => {
  
  // get all products
  it("should GET all the products", (done) => {
   chai.request(server)
.get('/api/products')
.end((err, response) => {
  response.should.have.status(200);
    response.body.should.be.a('array');
    response.body.length.should.be.greaterThan(3);
  done();
});
            });

            // get error - using wrong url no response should be returned
            it("should NOT GET all the products", (done) => {
              chai.request(server)
           .get('/api/prod')
           .end((err, response) => {
             response.should.have.status(404);              
             done();
           });
                       });
                      });

                      // TEST THE GET ID ROUTE

                       
                       describe("GET /api/products/:item", () => {

                                      // get product by name
                                      it("should GET a product by name", (done) => {
                                        let pick = "chocolate";
                                        
                                        chai.request(server)                         
                                    .get('/api/products/' + pick)
                                    .end((err, response) => {
                                      response.should.have.status(200);
                                        response.body.should.be.a('array');
                                           expect(response.body.some((item) => item.productName === pick)).to.equal(true);
                                      done();
                                    });
                                              
               
              });
  
                        // TO DO - STATUS CODE - get product by name does not exist
                        it("should NOT GET a product by name", (done) => {
                          let pick = "dust";
                          
                          chai.request(server)                         
                      .get('/api/products/' + pick)
                      .end((err, response) => {
                     //  response.should.have.status(404);
                          response.body.should.be.a('array');
                             expect(response.body.some((item) => item.productName === pick)).to.equal(false);
                        done();
                      });
});


});


// TEST POST ROUTE - TO DO

describe("POST /api/products", () => {

  // TO DO - product is not defined - add a new product 
  it("should POST a product", (done) => {
  //  this.timeout(5000);
   let newProd = createTestProduct();
    
    chai.request(server)                         
.post('/api/products/')
.set('content-type', 'application/json')
.send({name: "test",
image: "/images/test.jpg",
price: 2.74,
likes: 3,
category: "test",}) // send headers
.end((err, response) => {
  response.should.have.status(201);
    response.body.should.be.a('array');
    done();
});        
});

// TO DO - product is not defined - add a new product 
it("should NOT POST a product", (done) => {
    
  chai.request(server)                         
.post('/api/products/')
.set('body', {name: 'hi'}) // send headers
.set('content-type', 'application/json')
.end((err, response) => {
response.should.have.status(400);
  response.body.should.be.a('array');
  done();
});        
});



});

// TEST THE PUT ROUTE

describe("PUT /api/products/id", () => {
  
  // TO DO - product is not defined - update product
  it("should update and replace the product", (done) => {
  let productID = 3;

   chai.request(server)
.put('/api/products/' + productID)
.set('body', {name: "test",
image: "/images/test.jpg",
price: 2.74,
likes: 3,
category: "test",}) // send headers
.set('content-type', 'application/json')
.end((err, response) => {
  response.should.have.status(200);
    response.body.should.be.a('array');
    response.body.length.should.be.eq(4);
  done();
});
            });

            // incorrect id should not update product
            it("should NOT update and replace the product", (done) => {
              let productID = 1000;
            
             chai.request(server)
          .put('/api/products/' + productID)
          .end((err, response) => {
           // response.should.have.status(404);
              response.body.should.be.a('array');
              response.body.length.should.be.eq(4);
            done();
          });
                      });
          });

// TEST THE PATCH ROUTE

describe("PATCH /api/products/id", () => {
  
  // TO DO - product is not defined - update product
  it("should update the product", (done) => {

    let productID = 4
  
   chai.request(server)
.patch('/api/products/' + productID)
.end((err, response) => {
  response.should.have.status(200);
    response.body.should.be.a('string');
    response.body.length.should.be.eq(0);
  done();
});
            });

            // TO DO - product is not defined - incorrect id should not update product
            it("should NOT update the product", (done) => {
            
              let productID = 1000;
          
             chai.request(server)
          .patch('/api/products/' + productID)
          .end((err, response) => {
          //  response.should.have.status(404);
              response.body.should.be.a('array');
              response.body.length.should.be.eq(4);
            done();
          });
                      });
          });

          // TEST THE DELETE ROUTE

describe("DELETE /api/products/id", () => {
  
  // TO DO - expected status code 200 but got 404 - update product
  it("should delete the product", (done) => {
    let productID = 4
      chai.request(server)
.delete('/api/products/' + productID)
.end((err, response) => {
  response.should.have.status(200);
      response.body.length.should.be.eq(0);
  done();
});
            });

            // incorrect id should not delete product
            it("should NOT delete the product", (done) => {
              let productID = 1000;
                           chai.request(server)
          .delete('/api/products/' + productID)
          .end((err, response) => {
            response.should.have.status(200);
                     done();
          });
                      });
          });




});

