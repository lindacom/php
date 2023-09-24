let chai = require('chai');
let chaiHttp = require('chai-http');
//let server = '..api/api.js';
let server = 'http://localhost:8090';
chai.should();
chai.use(chaiHttp);
import { assert, expect, should } from 'chai';
import Allproducts, { searchFilter, getTopStars, getAlphabetically, getPriceLowHigh, getPriceHighLow, getAllProducts, getProduct, addStars, increaseQuantity, decreaseQuantity, addToCart, totalize } from './solutioncode';

require('isomorphic-fetch'); // enables the use of javascript fetch api

describe("Products search filter", () => {

    describe("GET by category", () => {
      
      // get product by category
      it("should GET all the products that match a category", (done) => {
             expect(searchFilter("sweets")).to.equal("Chocolate");
      done();
    });
});


 // get products with the most stars
 describe("GET by stars", () => {
 it("should GET all the products that have the most stars", (done) => {
 // getTopStars();
  expect(getTopStars()).to.equal("Lemon");
    done();
 });
});

// get products with the most stars
describe("GET alphabetically", () => {
  it("should GET all the products A-Z", (done) => {
     expect(getAlphabetically().length).to.equal(4);
     done();
  });
 });

 // get products by price low to high
describe("GET prie low to high", () => {
  it("should GET all the products lowest price first", (done) => {
     expect(getPriceLowHigh().length).to.equal(4);
     expect(getPriceLowHigh()).to.be.a('array');
     done();
  });
 });

  // get products by price high to low
describe("GET prie high to low", () => {
  it("should GET all the products highest price first", (done) => {
     expect(getPriceHighLow().length).to.equal(4);
     expect(getPriceHighLow()).to.be.a('array')
     done();
  });
 });






             
            });
      