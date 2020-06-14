# Setting up PHPUnit

```shell script
$ composer init
```
Accept defaults for all questions and answer `no` for defining dependencies and `yes` for dev-dependencies. Search for and select `phpunit/phpunit` and use the latest version.

You should end up with a composer.json file that looks something like this:

```json
{
    "name": "alexsaunders/escooters",
    "require-dev": {
        "phpunit/phpunit": "^9.2"
    },
    "require": {}
}
```

To this we need to add two extra properties to enable autoloading:

```json
{
    "name": "alexsaunders/escooters",
    "require-dev": {
        "phpunit/phpunit": "^9.2"
    },
    "require": {},
    "autoload": {
       "psr-4": {
           "App\\": "src/"
       }
    },
    "autoload-dev": {
       "psr-4": {
           "App\\Tests\\": "tests/"
       }
    }
}
```

Create the folders referenced in the composer.json file:

```shell script
$ mkdir src tests
```

And also a configuration file so PHPUnit knows where our code lives:

```shell script
$ touch phpunit.xml
```

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit colors="true" bootstrap="vendor/autoload.php">
    <testsuites>
        <testsuite name="TestProject Test Suite">
            <directory>./tests/</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

To test that everything is hooked up right add a dummy class and test:

```php
# src/ExampleClass.php

<?php declare(strict_types=1);

namespace App;

class ExampleClass
{
    static public function trueIsTrue()
    {
        return true;
    }
}
```

```php
# tests/ExampleTest.php

<?php declare(strict_types=1);

namespace App\Tests;

use App\ExampleClass;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testItsWorking()
    {
        self::assertTrue(ExampleClass::trueIsTrue());
    }
}
```

Your project structure should look like this:

```text
.
├── README.md
├── composer.json
├── composer.lock
├── phpunit.xml
├── src
│   └── ExampleClass.php
├── tests
│   └── ExampleTest.php
└── vendor
    ├── autoload.php
    ├── bin
    │   └── phpunit -> ../phpunit/phpunit/phpunit
... multiple further vendor folders
```

From the root directory, run:

```shell script
$ vendor/bin/phpunit
```

Which should result in our first passing test:

```text
PHPUnit 9.2.2 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 00:00.011, Memory: 4.00 MB

OK (1 test, 1 assertion)
```

If you're getting error messages here make sure there are no typos with any of the class namespaces, ensure the filenames match the classnames and that the composer.json has the autoload sections completed correctly.

One final tip! Ensure you have a .gitignore file created and are excluding the vendor directory:

```shell script
$ touch .gitignore
```

.gitignore contents:
```text
/vendor
```
