// CREATE A CONSTRUCTOR: n.b. you can only default export one thing usually the class

export default class Product {

constructor (id, name, image, price, likes, category) {
  this.id = id;
  this.name = name;
  this.image = image;
  this.price = price;
  this.likes = likes;
this.category = category;
}
}

let products = '';
let productArray = [];
let result = document.getElementById('dataResult');
let itemsTable = document.getElementById('itemsTable');
//itemsTable.addEventListener('click', itemRowClick());

export function displayProducts() {
 
  fetch('http://localhost:8090/api/products')
  .then(response => response.json())
 .then(data => { 
   
  for(let i=0; i<data.length; i++) {
     products = new Product(data[i].productID, data[i].productName, data[i].productUrl, data[i].price, data[i].likes, data[i].category)
    productArray.push(products); 
    }
   // console.log(productArray); 
    }).then(() => {

      for(let j=0; j<productArray.length; j++) {
      let itemID = productArray[j].id;
      let itemName = productArray[j].name;
      let itemUrl = productArray[j].image;
      let itemPrice = productArray[j].price;
      let itemLikes = productArray[j].likes;
      let itemCategory = productArray[j].category;
  
    let  dataTable = 
    '<tr>' +
      '<td>' + itemID  + '</td>' +
      '<td>' +  itemName  + '</td>' +
      '<td>' +  itemUrl + '</td>' +
      '<td>' +  itemPrice  + '</td>' +
      '<td>' +  itemLikes  + '</td>' +
      '<td>' +  itemCategory + '</td>' +
      '<td><button>Add to cart</button></td>' +
      '</tr>';
      result.innerHTML += dataTable;
      }
    
    //  result.innerHTML += dataTable;
    });
  
}

// button click event gets input value
document.getElementById("singleProduct").addEventListener("click", function() {
 let singleProduct = document.getElementById("prodName").value;
  getProduct(singleProduct);
});

  // send fetch request for one product
  export function getProduct(name) {
    let named = name;
    fetch(`http://localhost:8090/api/products/${named}`)
    .then(response => response.json())
   .then(data => console.log(data)); 
  }

  // button click event gets input value
/*document.getElementById("prodCreate").addEventListener("click", function() {
  alert("hi");
 });*/

 // create a product
 /* {
  name: "Mince",
  image: "/images/mince.jpg",
  price: 2.74,
  likes: 3,
  category: "meat",
  quantity: 1,
}*/


/*export function createProductsTable() {
 
 let pproductArray = productArray;
        
 for(let j=0; j<pproductArray.length; j++) {
      let itemID = pproductArray[j].id;
      let itemName = pproductArray[j].name;
      let itemUrl = pproductArray[j].image;
      let itemPrice = pproductArray[j].price;
      let itemLikes = pproductArray[j].likes;
      let itemCategory = pproductArray[j].category;
  
    let dataTable = 
    
      '<td style="width: 60px">' + itemID  + '</td>' +
      '<td style="width: 500px">' +  itemName  + '</td>' +
      '<td style="width: 60px">' +  itemUrl + '</td>' +
      '<td style="width: 60px">' +  itemPrice  + '</td>' +
      '<td style="width: 60px">' +  itemLikes  + '</td>' +
      '<td style="width: 60px">' +  itemCategory + '</td>' +
      '</tr>';
   result.innerHTML += dataTable;    
   console.log(dataTable);
      }   
     // result.innerHTML += '<p>hello<p>'; 
     console.log(productArray);
  
}  */











