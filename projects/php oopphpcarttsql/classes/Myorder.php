<?php
// this customer class uses mysql class which implemnts DB interface.

include 'Mysql.php';
?>

<?php

class Myorder {

    public $CustomerName ;
public $email;
public $address ;
public $postcode ;
public $item_name ;
public $item_price ;
public $item_quantity ;


function __construct($id, $name, $array){

$this->id = $id;
$this->CustomerName = $name;

    if (is_array($array)){

                echo $id;
               echo $this->CustomerName; 
               echo '<br />';

    foreach($array as $me){
        foreach($me as $k=>$v){
            $this->$k = $v;                  
               } 
                
        print  'ITEM NAME: ' .$this->item_name.'PRICE:' .$this->item_price. 'QUANTITY:' .$this->item_quantity.
                      '<br>';  
                    
     }
     
    }
  } 

   function getOrder($item_name, $item_price, $item_quantity )
    {
        echo '<hr />';
       echo         $this->id;
 echo  $this->CustomerName;
  echo $this->item_name;
  echo $this->item_price;
  echo $this->item_quantity;
 
//  echo '<hr />';
 // print_r($this->ordered);
    }

// public Books { get; set; }


/* public decimal cost {
    get {
        decimal total = 0;
        foreach(Book b in books) {
            total += b.price;
        }
        return total;
    }
}

public decimal price {
    get {
        //collate prices from order detail class
        decimal total = 0;
        for(int i=0; i < numberOfOrderDetails; i++) {
            total += orderDetails[i].Price;
        }
        return total;
    }
}

orderDetail[] orderDetails = new OrderDetail [100];

int numberOfOrderDetails = 0;

public void Add (orderDetail orderDetail1) {
    orderDetails[numberOfOrderDetails ++] = orderDtail1;
}*/


}


?>