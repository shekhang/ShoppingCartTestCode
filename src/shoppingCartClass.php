<?php


class ShoppingCartClass 
{
    private $cart; // hold the items object initialised as an array
    
    
    /**
     * Create an empty Cart
     */
    public function __construct() {
        $this->cart = array();
    }
    
    /**
     * add items to the cart array
     * if the items is array then add all the items
     * if the items only an object then push to the cart array 
     * @param ItemClass|ItemBOGOClass $items
     */
    public function addItems($items) {
        if (is_array($items))
        {
            foreach ($items as $item) {
                array_push($this->cart, $item);
            }
        }
        else {
            array_push($this->cart, $items);
        }
    
    }
    
    /**
     * This will empty the cart
     */
    public function emptyCart () {
        $this->cart = array();
    }
    
    /**
     * this will calculate all the total valur in the cart
     * @return string of total money of the cart
     */
    public function totalCart () {
        $totalPrice = 0;
        
        foreach ($this->cart as $cartItem) {
            $totalPrice = $totalPrice + ( $cartItem->getSubtotal());
        }
        
        return number_format($totalPrice,2,".",",");
    } 
    
    /**
     * return the total count of number of items in the cart
     * @return number
     */
    public function totalCount() {
        $totalCount = 0;
        
        foreach ($this->cart as $cartItem) {
            $totalCount = $totalCount + $cartItem->getQty();
        }    
        
        return $totalCount;
    }
    
    /**
     * this will print out the list of items in the cart
     */
    public function listCart() {
        
        echo "Current Shopping Cart List ! \n";
        echo "-------------------------------- \n";
        echo "Total Count " . $this->totalCount() ." items\n"; 
        
        foreach ($this->cart as $cartItem) {
            echo $cartItem->toString() . "\n";
        }
        
        echo "<< End of Shopping Cart List \n";
    }
    
        
}