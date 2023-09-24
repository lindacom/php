let chai = require('chai');
chai.should();
import { assert, expect, should } from 'chai';
import Allproducts, { favourites, addfavourites, unfavourite, addStars, increaseQuantity, decreaseQuantity, addToCart, totalize } from './solutioncode';

require('isomorphic-fetch'); // enables the use of javascript fetch api

describe("Favourites", () => {

    describe("create a favourite", () => {
      
      // add to favourites
      it("should add a product to favourites", (done) => {
        expect(addfavourites()).to.be.a('array');
             expect(addfavourites("Chocolate")).to.include("Chocolate");
      done();
    });
});

describe("remove a favourite", () => {
      
    // frmove from favourites
    it("should remove a product from favourites", (done) => {
      expect(unfavourite("mince")).to.be.a('array');
           expect(unfavourite("mince").length).to.equal(2);
    done();
  });
});

describe("View all favourites", () => {
      
    // frmove from favourites
    it("should show all products from favourites", (done) => {
      expect(favourites()).to.be.a('array');
           expect(favourites().length).to.be.greaterThan(1);
    done();
  });
});




});