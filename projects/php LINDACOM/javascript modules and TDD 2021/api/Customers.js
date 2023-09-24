class  Customers{
    constructor(CustomerId,CustomerName,email, address, postcode){
      this.Id = CustomerId;
      this.Title = CustomerName;
      this.Email = email;
      this.Address = address;
      this.Postcode = postcode;
    }
  }
  
  module.exports = Customers;