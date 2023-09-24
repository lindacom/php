// IMPORT class and import function using bracket. N.b. you could also import as and provide a new name
import Allproducts, {displayProducts} from '/oopAllproducts.js';
import Cart, {} from '/oopCart.js';

// CREATE AN OBJECT: products object, product array of objects


 

  displayProducts();
//  createProductsTable();

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

/*
     // put all products in a variable
     var myproducts = [mince, chocolate, lemon, lemonade];

 // CALL THE IMPORTED FUNCTION FOR EACH PRODUCT
// map() calls a function once for each element in an array.

myproducts.map(getProduct);*/


  

     