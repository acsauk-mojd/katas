# Get the Middle Letter(s)

## Requirements

- Your job is to return the middle letter of a word. If the word's length is odd, return the middle letter. If the word's length is even, return the middle 2 letters.

#### Acceptance Criteria

```php
$sut = new LetterGetter();

$sut->getMiddle("test") # => "es"
$sut->getMiddle("testing") # => "t"
$sut->getMiddle("middle") # => "dd"
$sut->getMiddle("A") # => "A"
$sut->getMiddle("of") # => "of"
```
