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

If you're unsure on how to setup PHPUnit (or something has gone wrong) then see the steps [here](https://github.com/acsauk-mojd/katas/blob/escooters/docs/phpunit_setup.md) on getting ready to write your first test.

Try to keep this pattern in mind:
* Write a failing test (Red)
* Run phpunit
* Read the feedback from phpunit
* Make the smallest possible change in order to move the message on
* If still failing, repeat the three steps above
* Once the test has passed (Green), look for any opportunities to streamline the code or reduce repetition/complexity (Refactor)
* Go back to the first step

Having a hard time getting started? Take a look at this test case and classes for the first user story:

<details><summary>Hints</summary>

```php
<?php declare(strict_types=1);


namespace App\Tests;

class DockingStationTest
{
    public function testReleaseScooter()
    {
        $dockingStation = new DockingStation();
        $scooter = $dockingStation->releaseScooter();
        self::assertInstanceOf(Scooter::class, $scooter);
    }
}

```

```php
<?php declare(strict_types=1);


namespace App;

class DockingStation
{
    public function releaseScooter()
    {
        return new Scooter();
    }
}
```

```php
<?php declare(strict_types=1);


namespace App;

class Scooter
{

}
```

</details>
