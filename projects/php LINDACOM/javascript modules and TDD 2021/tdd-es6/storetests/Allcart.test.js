let chai = require('chai');
let chaiHttp = require('chai-http');
//let server = '..api/api.js';
let server = 'http://localhost:8090';
chai.should();
chai.use(chaiHttp);
import { assert, expect, should } from 'chai';
import Allproducts, { increaseQuantity, decreaseQuantity, displayCart, cartBadge, cartBadgeUpdate, addToCart, removeFromCart, clearCart, total, totalize } from './solutioncode';

require('isomorphic-fetch'); // enables the use of javascript fetch api

// writing tests: arrange - what we need to do test, act - do, assert - results match as expect
// chai assertions: assert, expect, should

describe('SHOPPING CART', () => {

  describe('basket - display', () => {
    it('should show all items in the cart', () => {
      expect(displayCart().length).to.equal(2);
    });
  });

  describe('basket - badge display', () => {
    it('should count of items in the cart', () => {
      expect(cartBadge()).to.equal(2);
    });
  });

  describe('basket - badge display update', () => {
    it('should count of items in the cart when item is added', () => {
      expect(cartBadgeUpdate()).to.equal(3);
    });
  });

  describe('basket - add to', () => {
    it('should display product item added to cart', () => {
      expect(addToCart()).to.have.property('price');
    });
  });

  describe('basket - add to total', () => {
  it('should get total (price * quantity) from product item added to cart', () => {
  assert.equal(total(), 4);
  });
});

describe('basket - increase quantity', () => {
  it('should increase quantity for product item', () => {
    let item = "Mince";
    assert.equal(increaseQuantity(item), 2);
  });
});

describe('basket - decrease quantity', () => {
  it('should decrease quantity for product item', () => {
    let item = "Mince";
    assert.equal(decreaseQuantity(item), 0);
  });
});

describe('basket - remove item', () => {
  it('should remove product item from cart', () => {
    let item = "Mince";
    expect(removeFromCart(item).length).to.equal(3);
   // expect(removeFromCart(item).to.be.a('array'));
   
  });
});

describe('basket - clear all items', () => {
  it('should clear all product items from cart', () => {
        expect(clearCart().length).to.equal(0);

   
  });
});




// cart - taken from tutorial
describe('basket - total', () => {

    it('is zero when basket is empty', () => {
      function addItems() {
    const basket = [];
    assert.equal(totalize(basket), 0.0);
      }
  });
  
  it('is unit price of single item in basket', () => {
    function addItems() {
      const basket = [{
        unitpPrice: 10.0, quantity:1
      }];
  
    //  const basket1 = new Allproducts("Chocolate", "/images/chocolate.jpg", 2.00, 3, "sweets");
  
      assert.equal(totalize(basket), 10.0);
    }
  });
  
  it('is unit price * quantity of single item in basket', () => {
    function addItems() {
      const basket = [{
        unitpPrice: 10.0, quantity:2
      }];
  
    //  const basket1 = new Allproducts("Chocolate", "/images/chocolate.jpg", 2.00, 3, "sweets");
  
      assert.equal(totalize(basket), 20.0);
    }
  });
  
  it('is sum of all items in basket', () => {
    function addItems() {
      const basket = [
        {unitpPrice: 10.0, quantity:1  },
        {unitpPrice: 20.0, quantity:2  },
        {unitpPrice: 30.0, quantity:1  }
    ];
  
    //  const basket1 = new Allproducts("Chocolate", "/images/chocolate.jpg", 2.00, 3, "sweets");
  
      assert.equal(totalize(basket), 80.0);
    }
  });
  
  });




});
