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

class Retrievedata {
    // retrieve data from the customers table tbl_customer

    private $database = null;

    public $CustomerID; //not null
      public $CustomerName; //not null
      public $fullName;
      public $email;
      public $user_key;
      public $password; //not null
      public $dateOfBirth; //not null
      public $registered; //not null
      public $address;
      public $city;
      public $town;
      public $postcode;
      public $expiry; //not null

      
    // CONSTRUCTOR

         function __construct(DB $database)
        {

            $this->database = $database;
        // call to function
        $this->showAll($database);

        } 


// DISPLAYS ALL CUSTOMERS

public function showAll($connect)
{

    $query = $this->database->query("SELECT CustomerName + ' ' + email as title FROM dbo.tbl_customer");

         $result = $query->fetchAll();

 if($result == 0) { 
    echo "There are no customers to display"; 
    } else { 
        while ($result > 0) { 
            return $result; // array to string conversion in html file so had to use print_r

              }

  } 
  } 


  // add customers
  public function addCustomer($connect, $table_name, $data)
{

    $string = "INSERT INTO ".$table_name." (";
    $string .= implode(",", array_keys($data));
    $string .= str_replace(" ',' ","[,]", array_keys($data)); // need to convert speachmarks into brackets
    $string .= ") VALUES ("; 
    $string .=  "'" . implode("','", array_values($data)) . ")";

  
   
    // for testing - this works
  /*  $query = $this->database->query("
    INSERT INTO dbo.tbl_customer 
    ([CustomerID], [CustomerName], [password], [dateOfBirth], [registered], [expiry])
    values 
    (15, 'fred', 'my address', '31/03/2020', '31/03/2020', '31/03/2020') 
    "); */

 $query = $this->database->query($string);

   if($query){
        echo 'record inserted';
    } else {
        return false;
    }

   
}



}
?>