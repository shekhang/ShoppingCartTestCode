<?php

//use PHPUnit\Framework\TestCase;

class ItemClassTest extends PHPUnit_Framework_Testcase
{
    public function testCorrectInstanceBaseOnType () {
        
        $this->assertInstanceOf(ItemClass::class,ItemFactoryClass::createItemClass(null, 2));
        $this->assertInstanceOf(ItemBOGOClass::class,ItemFactoryClass::createItemClass('bogo', 3));
        
    }
    
    public function testProcudeCorrectSubtotalNormalItem()
    {
        
        $item = ItemFactoryClass::createItemClass(null, 5);
        $item->setPrice(3500); 
        $this->assertEquals(3500,$item->getSubTotal());
    }
    
    public function testProcudeCorrectSubtotalBogoItem()
    {
    
        $item = ItemFactoryClass::createItemClass('bogo', 7);
        $item->setPrice(5500);
        $this->assertEquals(5500,$item->getSubTotal());
    }
    
    public function testReturnNumberOfQtyNormalItem()
    {
        $item = ItemFactoryClass::createItemClass(null, 8);
        $this->assertEquals(1,$item->getQty());
    }
    

    public function testReturnNumberOfQtyBogoItem()
    {
        $item = ItemFactoryClass::createItemClass('bogo', 6);
        $item->setPrice(5500);
        $this->assertEquals(2,$item->getQty());
    }
}