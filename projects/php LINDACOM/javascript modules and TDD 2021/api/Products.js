class Products {
    constructor(productId,productName,productUrl, price, likes, category){
      this.Id = productId;
      this.Title = productName;
      this.productUrl = productUrl;
      this.price = price;
      this.likes = likes;
      this.category = category;
    }
  }
  
  module.exports = Products;