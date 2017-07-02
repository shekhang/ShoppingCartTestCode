<?php



class ItemFactoryClass 
{
    /**
     * create a factory class that would return a class based on the type of items
     * @param string $type
     * @param number $itemId
     * @return ItemBOGOClass|ItemClass
     */
    public static function createItemClass ( $type , $itemId)
    {
        if ($type == "bogo") return new ItemBOGOClass($itemId); // bogo means buy one get one
        else return new ItemClass($itemId);    
    }    
}

class ItemClass
{
    private $itemId;
    private $name; // store name of the items
    private $type; // store type of the items
    private $price; // store Price of the items
    private $qty; // store the qty of the items
    
    /**
     * contruct a new normal item with quantity 1
     * @param unknown $itemId
     */
    public function __construct ( $itemId)
    {
        $this->itemId = $itemId;
        $this->type = 'null';
        $this->qty = 1;
    
    }
    
    /**
     * set name of the items
     * @param unknown $name
     */
    public function setName ( $name){
        $this->name = $name;
    }
    
    /**
     * set the Price of the items
     * @param unknown $price
     */
    public function setPrice ( $price) {
        $this->price = $price;
    }
    
    /**
     * get the sub total of the items
     * @return number
     */
    public function getSubtotal () {
        return $this->price * $this->qty;
    }
   
    /**
     * get items id
     * @return number
     */
    public function getItemId() {
        return $this->itemId;
    }
    
    /**
     * get the name of the items
     * @return string
     */
    public function getName() {
        return $this->name;
    }
    
    /**
     * get the Type of the items
     * @return string
     */
    public function getType() {
        return $this->type;
    }
    
    /**
     * get the quantity of the items
     * @return number
     */
    public function getQty() {
        return $this->qty;
    }
    
    /**
     * get the price of the items
     * @return number
     */
    public function getPrice() {
        return $this->price;
    }
    
    /**
     * return the string representation of the items
     * @return string
     */
    public function toString() {
        return "Item Id : " . $this->itemId . ",Name : ". $this->name . ",Type : ".$this->type . ",Price : ". number_format($this->price,2,'.',',') . ",Quantity : " . $this->qty . "."; 
    }
}


class ItemBOGOClass
{
    private $itemId;
    private $name; // store name of the items
    private $type; // store type of the items
    private $price; // store Price of the items
    private $qty; // store the qty of the items

    /**
     * contruct a new bogo item with quantity 2
     * @param unknown $itemId
     */
    public function __construct ($itemId)
    {
        $this->itemId = $itemId;
        $this->type = "bogo";
        $this->qty = 2;

    }

    /**
     * set name of the items
     * @param unknown $name
     */
    public function setName ($name){
        $this->name = $name;
    }

    /**
     * set the Price of the items
     * @param unknown $price
     */
    public function setPrice ($price) {
        $this->price = $price;
    }
    
    /**
     * get the sub total of the items for buy one get one free only one qty that calculated
     * @return number
     */
    public function getSubtotal () {
        return $this->price * ($this->qty-1);
    }
    
    /**
     * get items id
     * @return number
     */
    public function getItemId() {
        return $this->itemId;
    }

    /**
     * get the name of the items
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * get the Type of the items
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * get the quantity of the items
     * @return number
     */
    public function getQty() {
        return $this->qty;
    }
    
    /**
     * get the price of the items
     * @return number
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * return the string representation of the items
     * @return string
     */
    public function toString() {
        return "Item Id : " . $this->itemId . ",Name : ". $this->name . ",Type : ".$this->type . ",Price : ". number_format($this->price,2,'.',',') . ",Quantity : " . $this->qty . ".";
    }
}