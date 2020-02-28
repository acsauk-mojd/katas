# Shopping cart

Shopping cart is a simple coding challenge, often described as a code kata. The objective of Shopping cart is to create a program with the following specification:

- Our goods are priced individually
- Some items are multipriced: 
    - buy n of them, and they’ll cost you y cents
    
- Our checkout accepts items in any order
- We need to be able to pass in a set of pricing rules each time we start handling a checkout transaction
- A total price should be output at the end of each checkout

 |Item|Unit Price|Special Price|
 |----|------|-------|
 |A|50|3 for 130|
 |B|30|2 for 45|
 |C|20||
 |D|15||
 
 
 Tips and tricks for setting up
 
 - change the composer.json to map your autoloader i.e.
 
 "autoload": {
         "classmap": [
             "Folder where your class is to be tested"
             ]
     }
     
  - To run the test `./vendor/bin/phpunit tests`
  - If an error of Error: Class '<namespace>' not found then could need to run `composer dump-autoload`