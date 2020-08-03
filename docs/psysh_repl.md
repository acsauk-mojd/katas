# Using PsySH to run your code

PsySH is a powerful REPL and code environment that allows you to try out both standard PHP functions and your apps classes and functions.

## Getting started
The easiest way to get started is to add it as a dev dependency to an app that has PSR-4 class autoloading setup (see [PHPUnit setup]() for details on this):

```shell script
$ composer require --dev psy/psysh
```

Once installed you can open a new PsySH session and start playing around with your code:

```shell script
$ vendor/bin/psysh
```

As long as autoloading is setup correctly you can access any class and function in your app and experiment with how things work. Just keep in mind that you'll need to address any of your classes or functions using their Fully Qualified Namespace (FQN):

```php
>>> $dc = new App\DockingStation();
=> App\DockingStation {#2361}

>>> $ds->releaseScooter();
=> App\Scooter {#2365}
```

This is a great way to confirm your understanding of the app you're working on and stops the excessive use of die() or var_dump(). It also allows you run an app via command line rather than having to worry about attaching a frontend to it or relying on test suites alone.


