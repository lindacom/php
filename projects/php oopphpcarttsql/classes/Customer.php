<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?> 

<?php
// this customer class uses mysql class which implemnts DB interface.

// include 'Mysql.php';
?>

<?php
 
class Customer {

      public $id;
    public  $name;
   public  $address;
    

     private $database = null;
     // CONSTRUCTOR

    public function __construct(DB $database, $name)
    {
        // database setup
        $this->database = $database;
      //  $this->id = $id;
        $this->name = $name;
     
               // call to function
        $this->getCustomerName($database, $name);
    }

   
    // PROPERTIES

    // declare property variables - taken from database
    
    /* CustomerID;
    CustomerName;
    address;
    password;
    email;
    fullNme;
    user_key;
    dateOfBirth;
    registered;
    city;
    town;
    postcode;
    expiry;
    */



  // string $name;
  // var $email;
   // var $address;

    // METHODS

  function getCustomerName($connect, $name)
    {
  // query to get username from the url and find in database      
$main = $name;

$query = $this->database->query("SELECT CustomerID, CustomerName, email, address, city, town, postcode
                  FROM tbl_customer
                  WHERE CustomerName = '$main'
                  LIMIT 1");

                  if($query === false) {
    die("Database query failed");
   
} else {

                  $customer = $query->fetch(PDO::FETCH_ASSOC); // array

                  return $customer;

}   


    // GETTERS AND SETTERS

    // setters
 /*  function set_name($name) {
        $this->name = $customer['email'];
    }

    // getters
  function get_name() {
        return  $this->name;
    }

   function set_address($address) {
        $this->address = $address;
    }

    // getters
  function get_address() {
        return  $this->address;
    }*/




    

    }
}
 

?>





