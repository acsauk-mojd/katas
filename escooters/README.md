# Escooters Kata

The people of Birmingham are finally getting escooters! As a budding developer working for Transport for West Midlands (TfWM) you've been tasked with creating the app behind managing brums escooter network. TfWM have insisted that the app be developed using Test Driven Development (TDD) to ensure there is good documentation and a high level of test coverage on code written.

Create a new branch of this repo ready to start working on the problem.

## The problem

The product manager at TfWM has decided to use a docking system where users can pick up and return escooters around the city. They have provided you with the following user stories for the MVP launch of the system which will need to be broken down into functional representations. See [here](https://github.com/acsauk-mojd/katas/blob/escooters/docs/user_stories.md) for tips on translating user stories into functional representations.

```text
As a person,
So that I can ride an escooter,
I need a docking station to release a escooter.

As a person,
So that I can ride a escooter safely,
I need to know if the escooter I'm interested in is working

As a member of the public
So I can return an escooter I've rented
I want to dock my escooter at the docking station

As a member of the public
So I can decide whether to use the docking station
I want to see a an escooter that has been docked

As a member of the public,
So that I am not confused and charged unnecessarily,
I'd like docking stations not to release escooters when there are none available.

As a maintainer of the system,
So that I can control the distribution of escooters,
I'd like docking stations not to accept more escooters than their capacity.

As a system maintainer,
So that I can plan the distribution of escooters,
I want a docking station to have a default capacity of 20 escooters.

As a system maintainer,
So that busy areas can be served more effectively,
I want to be able to specify a larger capacity of escooters when necessary.

As a member of the public,
So that I reduce the chance of getting a broken escooters in future,
I'd like to report an escooters as broken when I return it.

As a maintainer of the system,
So that I can manage broken escooters and not disappoint users,
I'd like docking stations not to release broken escooters.

As a maintainer of the system,
So that I can manage broken escooters and not disappoint users,
I'd like docking stations to accept returning escooters (broken or not).
```

The product manager also has some extra features ready for the next iteration of the app:

```text
As a maintainer of the system,
So that I can manage broken escooters and not disappoint users,
I'd like vans to take broken escooters from docking stations and deliver them to garages to be fixed.

As a maintainer of the system,
So that I can manage broken escooters and not disappoint users,
I'd like vans to collect working escooters from garages and distribute them to docking stations.
```

# Setting up PHPUnit

```shell script
$ composer init
```
Accept defaults for all questions and answer `no` for defining dependencies and `yes` for dev-dependencies. Search for and select phpunit/phpunit and use the latest version.

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
