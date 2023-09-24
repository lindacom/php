let chai = require('chai');
let chaiHttp = require('chai-http');
chai.should();
chai.use(chaiHttp);
import { assert, expect, should } from 'chai';
import Allproducts, {  createDelivery } from './solutioncode';

require('isomorphic-fetch'); // enables the use of javascript fetch api

describe('DELIVERY', () => {

    describe('delivery - create', () => {
      it('should create a delivery with time, date added to address and order', () => {
        expect(createDelivery().length).to.equal(5);
      });
    });




});