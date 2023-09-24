//contains main functions for the tests

require('isomorphic-fetch'); // enables the use of javascript fetch api

// CREATE A CONSTRUCTOR: n.b. you can only default export one thing usually the class

export default class Allproducts {

  constructor(name, image, price, likes, category) {
    this.name = name;
    this.image = image;
    this.price = price;
    this.likes = likes;
    this.category = category;
  }
}

// CREATE AN OBJECT: products object, product array of objects
let products = new Allproducts;
 products = {
  product: [
    {
      name: "Mince",
      image: "/images/mince.jpg",
      price: 2.74,
      likes: 3,
      category: "meat",
    },
    {
      name: "Chocolate",
      image: "/images/chocolate.jpg",
      price: 2.00,
      likes: 3,
      category: "sweets",
    },
    {
      name: "Lemon",
      image: "/images/lemon.jpg",
      price: 0.30,
      likes: 4,
      category: "fruit",
    },
    {
      name: "Lemonade",
      image: "/images/lemonade.jpg",
      price: 0.90,
      likes: 2,
      category: "drinks",
    },
  ],
};

// SEARCH FILTERS
// filter by category
export function searchFilter(filter) {
  filter = filter.toUpperCase(); // search input in uppercase
 
  for (let i = 0; i < products.product.length; i++) {
    if (products.product[i].category.toUpperCase().indexOf(filter) > -1) {
      return products.product[i].name;
    
    }
  }
}

// filter by highest stars

export function getTopStars() {
  let liked = [];
  
  for (let i = 0; i < products.product.length; i++) {
    let likes = products.product[i].likes;
    liked.push(likes);
  }
    liked.sort().reverse();
    let topLiked = liked[0];
 
    for (let j = 0; j < products.product.length; j++) {
         if (products.product[j].likes == topLiked) {
           return products.product[j].name;
                  }
    }
  }

  // filter alphabetically

export function getAlphabetically() {
  let alphabetSorter = [];
  let sorted = [];
  
  for (let i = 0; i < products.product.length; i++) {
    let item = products.product[i].name;
    alphabetSorter.push(item);
  }
    alphabetSorter.sort();
 
    for (let j = 0; j < alphabetSorter.length; j++) {
      sorted.push(alphabetSorter[j]);
     
    }
   
    return sorted;
  }

    // filter price low to high

export function getPriceLowHigh() {
  let priceSorter = [];
  let sorted = [];
    
  for (let i = 0; i < products.product.length; i++) {
    let item = products.product[i].price;
    priceSorter.push(item);
  }
    priceSorter.sort();
 
    for (let k = 0; k < priceSorter.length; k++) {
    for (let j = 0; j < products.product.length; j++) {
           if( priceSorter[k] === products.product[j].price){
     sorted.push(products.product[j])
    }
  }}
    return sorted;
 }

     // filter price high to low

export function getPriceHighLow() {
  let priceSorter = [];
  let sorted = [];
    
  for (let i = 0; i < products.product.length; i++) {
    let item = products.product[i].price;
    priceSorter.push(item);
  }
    priceSorter.sort().reverse();
 
    for (let k = 0; k < priceSorter.length; k++) {
    for (let j = 0; j < products.product.length; j++) {
           if( priceSorter[k] === products.product[j].price){
     sorted.push(products.product[j])
    }
  }}
    return sorted;
 }

 // create a test product
export function createTestProduct() {
  let productTest = new Allproducts;
 productTest = {
  product: [
    {
      name: "test",
      image: "/images/test.jpg",
      price: 2.74,
      likes: 3,
      category: "test",
    },]
}
return productTest;
}

// FAVOURITES

let favouriteItems = ["mince", "Lemon"];

// display all favourites
export function favourites() { 
      return favouriteItems;
}

// add to favourites
export function addfavourites(myFav) { 
  favouriteItems.push(myFav);  
  return favouriteItems;
}

// remove from favourites
export function unfavourite(myFav) { 
  favouriteItems.shift(myFav);  
return favouriteItems;
}

// CART

// create cart 


let cart = [ {
  name: "Mince",
  image: "/images/mince.jpg",
  price: 2.74,
  likes: 3,
  category: "meat",
  quantity: 1,
},
{
  name: "Lemonade",
  image: "/images/lemonade.jpg",
  price: 0.90,
  likes: 2,
  category: "drinks",
}];

// display cart
export function displayCart() { 
  return cart;
}

export function cartBadge() {
  let badgeCount = cart.length;
  return badgeCount;
}

// add to cart
let itemChosen = {
  name: "Chocolate",
  image: "/images/chocolate.jpg",
  price: 2.00,
  likes: 3,
  category: "sweets",
};


// add item to cart
export function addToCart() { 
     cart.push(itemChosen);
     for(let i=0; i<cart.length; i++){
       if(cart[i] == itemChosen){
         return cart[i];

       }
     }
      } 

      // add item to cart and update badge
export function cartBadgeUpdate() { 
  cart.push(itemChosen);
  let badgeCount = cart.length;
  return badgeCount;

    }

    
// calculate cart total
export function total(itemPrice, itemQuantity){
  itemPrice = itemChosen.price;
  itemQuantity = 2;
  let totalprice = itemQuantity * itemPrice;
  return totalprice;
}

export function totalize(basket){
  if(cart.length == 0)
  return 0;
  // else
  const item = cart[0];
  return itemChosen.price * item.quantity;
}

// increase quantity
export function increaseQuantity(item) {
  let increasedValue = 0
  for (var j = 0; j < cart.length; j++) {
    if(cart[j].name == item) {
          let more = cart[j].quantity;
       increasedValue = more + 1;
     
    }
  }
  return increasedValue;
}

// decrease quantity
export function decreaseQuantity(item) {
  let decreasedValue = 0
  for (var j = 0; j < cart.length; j++) {
    if(cart[j].name == item) {
      let less = cart[j].quantity;
       decreasedValue = less - 1;

      }
  }
 return decreasedValue;
}

// remove from cart
export function removeFromCart(item) {  
  
  for (let j = 0; j < cart.length; j++) {
    if(cart[j].name == item){
      cart.shift(cart[j]);  
    }    
}
return cart;
}

// clear cart
export function clearCart(item) {  
cart.length = 0; // setting legth to 0 clears the array and any references to it
return cart;
}

// ORDER
let cart2 = [{
  name: "Mince",
  image: "/images/mince.jpg",
  price: 2.74,
  likes: 3,
  category: "meat",
  quantity: 1,
},
{
  name: "Lemonade",
  image: "/images/lemonade.jpg",
  price: 0.90,
  likes: 2,
  category: "drinks",
}];

// create empty order array
let order = [];

// create order
export function createOrder() {
order = cart2;
// console.log(order);
  return order;
}

// display order
export function displayOrder() {
  return order;
}

// update order - add address

let orderWithAddress = createOrder();

export function addAddress() {
 let address = { address: "my street"};
 orderWithAddress.push(address);
// console.log(orderWithAddress);
 return orderWithAddress;
 
}

// delete order
export function deleteOrder() {
  orderWithAddress.length = 0;
  return orderWithAddress;
}

// DELIVERY

let orderAddWithDelivery =  [{
  name: "Mince",
  image: "/images/mince.jpg",
  price: 2.74,
  likes: 3,
  category: "meat",
  quantity: 1,
},
{
  name: "Lemonade",
  image: "/images/lemonade.jpg",
  price: 0.90,
  likes: 2,
  category: "drinks",
}, 
{
  address: "21 My Street"
}];

let today = new Date(); // create a new date object
// add methods to the date object
let date = { date: today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate() };
let time = { time: today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds()};

// create delivery date
export function createDelivery() {

  orderAddWithDelivery.push(date);
  orderAddWithDelivery.push(time);

//  console.log(orderAddWithDelivery);
return orderAddWithDelivery;
}


 