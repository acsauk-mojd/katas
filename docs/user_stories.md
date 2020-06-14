# User Stories

The purpose of a User Story is to describes a feature of an app, from the perspective of somebody using the app. A combination of user stories will be used to distill the requirements of a system. A systems is made up of Objects and Messages, where Objects describe the objects within the system, and Messages describe how those objects interact. We call these systems Domain Models.

To help with developing the structure of an object or class, its good practice to translate user stories into functional representations using Objects and Messages. For example, here's a user story about adding a search function to an app:

```text
As a user,
So I can find customers,
I want to search for my customers by their surnames.
```

And here is a functional representation of that story:

Objects| Messages
-------|----------------
User|	
Customer|find_by_surname

Try translating the two user stories below into Objects and Messages:

```text
As a person,
So that I can ride an escooter,
I need a docking station to release a escooter.

As a person,
So that I can ride a escooter safely,
I need to know if the escooter I'm interested in is working
```



<details><summary>A possible solution...</summary>

    Objects  | Messages
    ------------- | -------------
    Person  | 
    Bike  | working?
    DockingStation | release_bike
</details>
