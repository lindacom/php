let chai = require('chai');
let chaiHttp = require('chai-http');
chai.should();
chai.use(chaiHttp);
import { assert, expect, should } from 'chai';
import Allproducts, {  createOrder, displayOrder, addAddress, deleteOrder } from './solutioncode';

require('isomorphic-fetch'); // enables the use of javascript fetch api

describe('ORDER', () => {

    describe('order - create', () => {
      it('should create an order', () => {
        expect(createOrder().length).to.equal(2);
      });
    });

    describe('order - view', () => {
        it('should display order', () => {
          expect(displayOrder().length).to.equal(2);
        });
      });

      describe('order - update', () => {
        it('should add address to order', () => {
          expect(addAddress().length).to.equal(3);
        });
      });

      describe('order - delete', () => {
        it('should delete the order', () => {
          expect(deleteOrder().length).to.equal(0);
        });
      });




});