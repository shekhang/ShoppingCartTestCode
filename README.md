
Instruction to Setup and run HWHHEHEHE
------------------------------------------------------
This Program is designed to run on the command line.
1. Please Clone from git hub 
2. Change the current directory to the ShoppingCartTestCode Folder
3. type php main.php to run the program

Git Hub Repository URL
-------------------------------------------------------------------
https://github.com/shekhang/ShoppingCartTestCode.git

Steps to test the Program
------------------------------------------------------
Firstly please create several items by using createitem command input with parameter of
<id> as item id
<name> as name of the item
<price> as the price of the time
<type> which are nothing for normal items, and 'bogo' for buy one get one free item

Here is the example :

> createitem 3 Torch 3.50 bogo 
this will create a buy one get one free items
> createitem 2 stickytape 2.35
this will create a normal items

Secondly, you need to add these items to the cart by using command addtocart
There are two ways to add items.
First, it is using item id which will add the item with ID provided to the cart

> addtocart 3

second, it is using 'all' which will add all the items that had been created to the cart

> addtocart all

for all other items that has not been created it will return error


Lastly, we could check the total cart price , total count and list cart.
These could be achieved by using these commands

> totalcart
This will return the total value in the cart
> totalcount
This will return the total count of quantity in the cart
> listcart
This will return a list of the cart

Example Output Results
-----------------------------------------------------
Welcome to Shopping Cart Test Code 
Here is the list of input command 
     1. createitem <id> <name> <price> [<type>] 
     2. addtocart [<id>|all]
     3. emptycart
     4. listcart
     5. totalcart
     6. totalcount
     7. exit / quit 
> createitem 2 torch 3.45
New Item Created
> createitem 3 lightbulb 2.55 bogo
New Item Created
> createitem 5 tie 9.80
New Item Created
> createitem 7 tv 3455
New Item Created
> createitem 8 soundbar 300
New Item Created
> createitem 9 candy 1.50 bogo
New Item Created
> addtocart 3
Item 3 Added to cart
> addtocart 10
Item with ID 10 was not found
> addtocart all
All Items Added to cart
> listcart
Current Shopping Cart List ! 
-------------------------------- 
Total Count 10 items
Item Id : 3,Name : lightbulb,Type : bogo,Price : 2.55,Quantity : 2.
Item Id : 2,Name : torch,Type : null,Price : 3.45,Quantity : 1.
Item Id : 3,Name : lightbulb,Type : bogo,Price : 2.55,Quantity : 2.
Item Id : 5,Name : tie,Type : null,Price : 9.80,Quantity : 1.
Item Id : 7,Name : tv,Type : null,Price : 3,455.00,Quantity : 1.
Item Id : 8,Name : soundbar,Type : null,Price : 300.00,Quantity : 1.
Item Id : 9,Name : candy,Type : bogo,Price : 1.50,Quantity : 2.
<< End of Shopping Cart List 
> totalcart
3,774.85
> totalcount
10
> addtocart all
All Items Added to cart
> totalcart
7,547.15
> totalcount
18
> emptycart
Current Total Count 18 items
Emptying Cart
Total Count 0 items
> totalcount
0
> totalcart
0.00
> addtocart all
All Items Added to cart
> totalcount
8
> totalcart
3,772.30
> exit
Thank you for testing this

ROOM for Improvements
------------------------------------------------------
1. ability to check if items exist in cart and update the quantity
2. ability to save cart to the database
3. provide login to the cart to indicate of appropriate saved cart
4. ability to test for user input rather than ignore some of the user inputs
