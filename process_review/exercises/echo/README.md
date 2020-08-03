## The Echo App spec

An app that repeats what you say until you exit it!

### Requirements

- The app runs on the command line or.

- When the app runs you are prompted with a phrase to say something

- The output also has information about the date and time formatted as below.

- The app continues to prompt you to say something until you type `exit`

- when you type `exit` the app outputs 'Goodbye!' and then ends.

Example interaction:

```
$ php echo.php
Say something:
hello, world
2018-01-09 | 16:26 | You said: 'hello, world'!
Say something:
exit
Goodbye!
```
