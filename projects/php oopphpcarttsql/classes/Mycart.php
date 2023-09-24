<?php
include ('Mycartitem.php');
session_start();

class Mycart
{
    /**
     * @var CartItem[]
     */
    private $items = [];
// private array $items = [];
    /**
     * @return \CartItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param \CartItem[] $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int     $quantity
     * @return \CartItem
     * @throws \Exception
     */
    public function addProduct(Product $product, int $quantity)
    {
        // find product in cart
        $cartItem = $this->findCartItem($product->getId());
        if ($cartItem === null){
            $cartItem = new Mycartitem($product, 0);
            $this->items[$product->getId()] = $cartItem;
        } 
        $cartItem->increaseQuantity($quantity);

         
        return  $cartItem;


//set session
/* if(isset($_GET['title']) && $_GET['title'] !== ""){ //if there is a book title in the url
   
    // IF THERE IS ALREADY A SESSION
    //check if id in the url is already in the cart
    //if not, count items in cart, add url details to array and add array to cart  
    //if so, send an alert message and redirect to search page

      if(isset($_SESSION["myproduct"]))  // if there is a cart session
      {  
           $item_array_id = array_column($_SESSION["myproduct"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  // if the id in the url is not already in the array
           {  
                $count = count($_SESSION["myproduct"]);  // count number of items in the cart
                $item_array = array(  // get id, title, price and quantity from the url and store in array
                     'item_id'               =>      $_GET["id"],
                   'item_name' =>     $_GET["title"], 
                    'item_price'          =>    $_GET["price"], 
                     'item_quantity'          =>     $_GET["quantity"],
                );  
                $_SESSION["myproduct"][$count] = $item_array;  // store item array in cart session
              
           } 
      }  // IF A SESSION DOES NOT ALREADY EXIST
      // add url details to an array, add the array to a new cart session
      else  
      {  
           $item_array = array(  // create a multidimensional array using id, title, price and quantity from url
                'item_id'               =>     $_GET["id"],
                   'item_name' =>     $_GET["title"], 
                    'item_price'          =>    $_GET["price"], 
                     'item_quantity'          =>     $_GET["quantity"]
           );  
           $_SESSION["myproduct"][0] = $item_array;  // store item array in cart session
      } 
 }

print_r($_SESSION["myproduct"]);*/







    }










    private function findCartItem(int $productId)
    {
        return $this->items[$productId] ?? null;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        unset($this->items[$product->getId()]);
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity()
    {
        $sum = 0;
        foreach ($this->items as $item) {
            $sum += $item->getQuantity();
        }
        return $sum;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum()
    {
        $totalSum = 0;
        foreach ($this->items as $item) {
            $totalSum += $item->getQuantity() * $item->getProduct()->getPrice();
        }

        return $totalSum;
    }
}
?>