<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?> 

<?php
// this class uses mysql class which implemnts DB interface.

include ('Mysql.php');
?>

<?php

class Filterdata {
    // retrieve data from the orders table

    private $database = null;

    public $id;//not null
    public $customerId; //not null
    public $CustomerName; //not null
    public $email; //not null
    public $cart;
    public $orderdetails;
    public $quantity; //not null
    public $price; //not null
    public $total; //not null
    public $totalCalculated; //not null
    public $user_id;  //not null
    public $name; 
    public $productId; //not null
    public $address; //not null
    public $shippingAddress;
    public $orderDate; //not null
    public $created_at; //not null
    public $updated_at; //not null
     

      
    // CONSTRUCTOR

         function __construct(DB $database)
        {

            $this->database = $database;
        // call to function
        $this->showAll($database);

        } 


// DISPLAYS ALL ORDERS

public function showAll($connect)
{

    $query = $this->database->query("SELECT * FROM dbo.orders where email = 'linda@linda.com'");

         $result = $query->fetchAll();

 if($result == 0) { 
    echo "There are no orders to display"; 
    } else { 
        while ($result > 0) { 
            return $result; // array to string conversion in html file so had to use print_r

              }

  } 
  } 


 // search for a book in cart using like

 public function findOrders($connect)
{

    $query = $this->database->query("SELECT * FROM dbo.orders where cart like '%coaching%';");

         $result = $query->fetchAll();

 if($result == 0) { 
    echo "There are no orders to display"; 
    } else { 
        while ($result > 0) { 
            return $result; // array to string conversion in html file so had to use print_r

              }
            }

  } 

  public function sumOrders($connect)
{

    $query = $this->database->query("SELECT sum(total) FROM dbo.orders;");

  // Print out result
while($row = $query->fetchAll()){
	echo "Total = $". $row['SUM(total)'];
	echo "<br />";
}

   /* if($result == 0) { 
       echo "There are no orders to display"; 
       } else { 
           while ($result > 0) { 
               return $result; // array to string conversion in html file so had to use print_r
   
                 }*/


               }



}
?>