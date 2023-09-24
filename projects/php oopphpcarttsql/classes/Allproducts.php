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

class Allproducts {

    private $database = null;

    private $products;

    public $ProductID;
    public $Title;
    public $Category;
    public $Price;

      
    // CONSTRUCTOR

         function __construct(DB $database)
        {

            $this->database = $database;
        // call to function
        $this->showAll($database);

        } 


// DISPLAYS ALL PRODUCTS

public function showAll($connect)
{

    $query = $this->database->query("SELECT * FROM dbo.books");

         $result = $query->fetchAll();

 if($result == 0) { 
    echo "There are no products to display"; 
    } else { 
        while ($result > 0) { 
            return $result; // array to string conversion in html file so had to use print_r

              }

  } 
  } 


}
?>