<?php
require './src/itemClass.php';


class ShoppingCartClassTest extends PHPUnit_Framework_Testcase
{

    public function testAddSingleItem ()
    {
        $cart = new ShoppingCartClass();
        
        $itemOne = ItemFactoryClass::createItemClass(null, 3);
        $itemOne->setPrice(3.50);
        $itemOne->setName("Light Bulb");

        $itemTwo = ItemFactoryClass::createItemClass(null, 4);
        $itemTwo->setPrice(4.00);
        $itemTwo->setName("Torch");
        
        $this->assertEquals(0,$cart->totalCount());
        
        $cart->addItems($itemOne);
        
        $this->assertEquals(1,$cart->totalCount());
        
        $cart->addItems($itemTwo);
        
        $this->assertEquals(2,$cart->totalCount());
        
    }
    
    public function testAddSingleBogoItem ()
    {
        $cart = new ShoppingCartClass();
    
        $itemOne = ItemFactoryClass::createItemClass('bogo', 3);
        $itemOne->setPrice(3.50);
        $itemOne->setName("Light Bulb");
    
        $itemTwo = ItemFactoryClass::createItemClass('bogo', 4);
        $itemTwo->setPrice(4.00);
        $itemTwo->setName("Torch");
    
        $this->assertEquals(0,$cart->totalCount());
    
        $cart->addItems($itemOne);
    
        $this->assertEquals(2,$cart->totalCount());
    
        $cart->addItems($itemTwo);
    
        $this->assertEquals(4,$cart->totalCount());
    
    }
    
    public function testAddArrayOfItems ()
    {
        $cart = new ShoppingCartClass();
        $itemContainer = array();
    
    
        $itemOne = ItemFactoryClass::createItemClass(null, 3);
        $itemOne->setPrice(3.50);
        $itemOne->setName("Light Bulb");
    
        array_push($itemContainer,$itemOne);
    
        $itemTwo = ItemFactoryClass::createItemClass(null, 4);
        $itemTwo->setPrice(4.50);
        $itemTwo->setName("Torch");
    
        array_push($itemContainer,$itemTwo);
        
        $itemThree = ItemFactoryClass::createItemClass(null, 5);
        $itemThree->setPrice(5.50);
        $itemThree->setName("LED Bulb");
        
        array_push($itemContainer,$itemThree);
        
        $this->assertEquals(0,$cart->totalCount());
        
        $cart->addItems($itemContainer);
    
        $this->assertEquals(3,$cart->totalCount());
    }
    
    public function testAddArrayOfBogoItems ()
    {
        $cart = new ShoppingCartClass();
        $itemContainer = array();
    
    
        $itemOne = ItemFactoryClass::createItemClass('bogo', 3);
        $itemOne->setPrice(3.50);
        $itemOne->setName("Light Bulb");
    
        array_push($itemContainer,$itemOne);
    
        $itemTwo = ItemFactoryClass::createItemClass('bogo', 4);
        $itemTwo->setPrice(4.50);
        $itemTwo->setName("Torch");
    
        array_push($itemContainer,$itemTwo);
    
        $itemThree = ItemFactoryClass::createItemClass('bogo', 5);
        $itemThree->setPrice(5.50);
        $itemThree->setName("LED Bulb");
    
        array_push($itemContainer,$itemThree);
    
        $this->assertEquals(0,$cart->totalCount());
    
        $cart->addItems($itemContainer);
    
        $this->assertEquals(6,$cart->totalCount());
    }
    
    public function testAddArrayOfMixedItems ()
    {
        $cart = new ShoppingCartClass();
        $itemContainer = array();
    
    
        $itemOne = ItemFactoryClass::createItemClass('bogo', 3);
        $itemOne->setPrice(3.50);
        $itemOne->setName("Light Bulb");
    
        array_push($itemContainer,$itemOne);
    
        $itemTwo = ItemFactoryClass::createItemClass(null, 4);
        $itemTwo->setPrice(4.50);
        $itemTwo->setName("Torch");
    
        array_push($itemContainer,$itemTwo);
    
        $itemThree = ItemFactoryClass::createItemClass('bogo', 5);
        $itemThree->setPrice(5.50);
        $itemThree->setName("LED Bulb");
    
        array_push($itemContainer,$itemThree);
    
        $this->assertEquals(0,$cart->totalCount());
    
        $cart->addItems($itemContainer);
    
        $this->assertEquals(5,$cart->totalCount());
    }
    
    public function testEmptyingCart () {
            $cart = new ShoppingCartClass();
            $itemContainer = array();
        
        
            $itemOne = ItemFactoryClass::createItemClass('bogo', 3);
            $itemOne->setPrice(3.50);
            $itemOne->setName("Light Bulb");
        
            array_push($itemContainer,$itemOne);
        
            $itemTwo = ItemFactoryClass::createItemClass('bogo', 3);
            $itemTwo->setPrice(4.50);
            $itemTwo->setName("Torch");
        
            array_push($itemContainer,$itemTwo);
        
            $itemThree = ItemFactoryClass::createItemClass('bogo', 3);
            $itemThree->setPrice(5.50);
            $itemThree->setName("LED Bulb");
        
            array_push($itemContainer,$itemThree);
        
            $this->assertEquals(0,$cart->totalCount());
        
            $cart->addItems($itemContainer);
        
            $this->assertEquals(6,$cart->totalCount());
            
            $cart->emptyCart();
            
            $this->assertEquals(0,$cart->totalCount());
           
    }
    
    public function testTotalCartAndCountMixedItems ()
    {
        $cart = new ShoppingCartClass();
        $itemContainer = array();
    
    
        $itemOne = ItemFactoryClass::createItemClass('bogo', 3);
        $itemOne->setPrice(3.50);
        $itemOne->setName("Light Bulb");
    
        array_push($itemContainer,$itemOne);
    
        $itemTwo = ItemFactoryClass::createItemClass(null, 4);
        $itemTwo->setPrice(4.50);
        $itemTwo->setName("Torch");
    
        array_push($itemContainer,$itemTwo);
    
        $itemThree = ItemFactoryClass::createItemClass('bogo', 5);
        $itemThree->setPrice(5.50);
        $itemThree->setName("LED Bulb");
    
        array_push($itemContainer,$itemThree);

        $cart->addItems($itemContainer);

        $this->assertEquals('13.50',$cart->totalCart());
        $this->assertEquals(5,$cart->totalCount());
    }
    
    public function testTotalCartAndCountBogoItems ()
    {
        $cart = new ShoppingCartClass();
        $itemContainer = array();
    
    
        $itemOne = ItemFactoryClass::createItemClass('bogo', 3);
        $itemOne->setPrice(3.50);
        $itemOne->setName("Light Bulb");
    
        array_push($itemContainer,$itemOne);
    
        $itemTwo = ItemFactoryClass::createItemClass('bogo', 4);
        $itemTwo->setPrice(4.50);
        $itemTwo->setName("Torch");
    
        array_push($itemContainer,$itemTwo);
    
        $itemThree = ItemFactoryClass::createItemClass('bogo', 5);
        $itemThree->setPrice(5.50);
        $itemThree->setName("LED Bulb");
    
        array_push($itemContainer,$itemThree);
    
        $cart->addItems($itemContainer);
    
        $this->assertEquals('13.50',$cart->totalCart());
        $this->assertEquals(6,$cart->totalCount());
    
    }
    public function testTotalCartAndCountNormalItems ()
    {
        $cart = new ShoppingCartClass();
        $itemContainer = array();
    
    
        $itemOne = ItemFactoryClass::createItemClass(null, 3);
        $itemOne->setPrice(3.50);
        $itemOne->setName("Light Bulb");
    
        array_push($itemContainer,$itemOne);
    
        $itemTwo = ItemFactoryClass::createItemClass(null, 4);
        $itemTwo->setPrice(4.50);
        $itemTwo->setName("Torch");
    
        array_push($itemContainer,$itemTwo);
    
        $itemThree = ItemFactoryClass::createItemClass(null, 5);
        $itemThree->setPrice(5.50);
        $itemThree->setName("LED Bulb");
    
        array_push($itemContainer,$itemThree);
    
        $cart->addItems($itemContainer);
    
        $this->assertEquals('13.50',$cart->totalCart());
        $this->assertEquals(3,$cart->totalCount());
    
    }
}
