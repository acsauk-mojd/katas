## Checkout

The purpose of this challenge is to implement a supermarket checkout that calculates the total price of a number of items - to be run in a REPL like PsySH or just passed to tests. Don't worry about I/O.


### Requirements
In a normal supermarket, things are identified using Stock Keeping Units, or SKUs.
In our store, we'll use individual letters of the alphabet (A, B, C, and so on).
Our goods are priced individually. In addition, some items are multi-priced: buy n of them, and they'll cost you y pounds.

For example, item A might cost 50 pounds individually, but this week we have a special offer:
- buy three As and they'll cost you 130.

Our price table and offers:
```
+------+-------+----------------+
| Item | Price | Special offers |
+------+-------+----------------+
| A    | 50    | 3A for 130     |
| B    | 30    | 2B for 45      |
| C    | 20    |                |
| D    | 15    |                |
+------+-------+----------------+
```

Notes:
 - For any illegal input (non capitals) simply return -1

**In order to complete the round you need to implement the following method:
     public function checkout(String $skus): Integer
     {}**

Where:
 - param[0] = eg. 'AAB', a String containing the SKUs of all the products in the basket
 - @return = eg. 120, an Integer representing the total checkout value of the items

### Acceptance Criteria

```php
$sut = new Shop();

$sut->checkout('aBc') # => -1
$sut->checkout('-B8x') # => -1
$sut->checkout(18) # => -1
$sut->checkout('AA') # => 100
$sut->checkout('ABCD') # => 115
$sut->checkout('AAA') # => 130
$sut->checkout('AAAAAA') # => 260
```
