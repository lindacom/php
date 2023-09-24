<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?> 

<?php
// this customer class uses mysql class which implemnts DB interface.

// include 'Mysql.php';
 include 'Mycart.php';
?>

<?php

class Product {

      private int $id;
    private string $title;
    private float $price;
   private int $availableQuantity;

    //Product constructor.

   // public function __construct($id, $title, $price, $availableQuantity)
   public function __construct($id, $title, $price)
    {
       $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->availableQuantity = 100;
     //  $this->availableQuantity = $availableQuantity;
    }

    public function getId()
    {
        return $this->id;
    }

     public function getTitle()
    {
        return $this->title;
    }

    public function getPrice()
    {
        return $this->price;
    }

   

public function addToCart($id, $title, $quantity)
    {     
        // new instance of cart object
        $minecart = new Mycart($id, $title, $quantity);  
     
     // add product in cart class
       $minecart->addProduct($this, $quantity);
  
    }


// for reference - public function addProduct(Product $product, int $quantity)

public function getAvailableQuantity()
    {
        return $this->availableQuantity;
    }


}
?>