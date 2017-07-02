<?php

include ('src/itemClass.php');
include ('src/shoppingCartClass.php');

/**
 * This is the main file to run the program
 * 
 * This main will as for standart input 
 * 
 * here is the possible standart input
 * 
 * 1. createitem <id> <name> <type> <price>
 * 2. addtocart <id>
 * 3. emptycart
 * 4. listcart
 * 5. totalcart
 * 6. totalcount
 * 7. exit
 * 
 */

echo "Welcome to Shopping Cart Test Code \n" .
    "Here is the list of input command 
     1. createitem <id> <name> <price> [<type>] 
     2. addtocart [<id>|all]
     3. emptycart
     4. listcart
     5. totalcart
     6. totalcount
     7. exit / quit \n";


$itemContainer = array();
$newCart = new ShoppingCartClass();

echo "> ";
$handle = fopen ("php://stdin","r");
while ($a_temp = fgets($handle)) {
    
    $a = explode(" ",$a_temp);
    
    $a = array_map('trim',$a);

    switch ($a[0]) {
        case 'createitem':
            $newItems = null;
            
            if (count($a) > 4) $newItems = ItemFactoryClass::createItemClass($a[4], $a[1]);
            else $newItems = ItemFactoryClass::createItemClass(null, $a[1]);
            
            $newItems->setName($a[2]);
            $newItems->setPrice($a[3]);
            
            $itemContainer[$a[1]] = $newItems;
            echo "New Item Created\n";
            break;
        case "addtocart":
            if ($a[1] == 'all') {
                $newCart->addItems($itemContainer);
                echo "All Items Added to cart\n";
            }
            elseif (is_numeric($a[1])) {
                if (array_key_exists($a[1], $itemContainer)) {
                    $newCart->addItems($itemContainer[$a[1]]);
                    echo "Item " . $a[1] . " Added to cart\n";
                }
                else echo "Item with ID ".$a[1]. " was not found\n";
            }
            else echo "You have a wrong parameter\n";
            break;
        case "emptycart":
            echo "Current Total Count " .$newCart->totalCount() . " items\n";
            echo "Emptying Cart\n";
            $newCart->emptyCart();
            echo "Total Count " .$newCart->totalCount() . " items\n";
            break;
        case 'listcart':
            $newCart->listCart();
            break;
        case "totalcart":
            echo $newCart->totalCart() ."\n";
            break;
        case "totalcount":
            echo $newCart->totalCount(). "\n";
            break;
        case "exit":
        case "quit":
            echo "Thank you for testing this\n";
            die();
            break;
        default:
            echo "The Command is not recognise\n";
            break;
        
    }
    
    echo "> ";
}


?>
