# Katas
This repo is a collection of katas/exercises that are particularly suited to learning a Test Driven Development(TDD) workflow.

## Introducing TDD
Test Driven Development is a software programming practice that can radically increase code quality and program design. It is used throughout top software development companies and we are hardcore advocates of it here at Makers Academy.

It can be a bit strange at first, but once you get used to it, it will help your designs to emerge and accelerate your coding skills remarkably.

## TDD in a nutshell
### Step 1: Write a failing test (RED)
We begin by describing a single expectation of our program. We do this using a testing framework. There are a number of frameworks to choose from but, generally speaking, we use PHPUnit for unit tests.

We make no immediate assumptions about what the program is, or how it should work; we simply write the code we wish we had to satisfy the expectation we are describing.

What makes this step particularly unusual for people starting TDD for the first time, is that we already know this test is going to fail for multiple reasons. Nevertheless, we do not write a single line of production code until there is a failing test in place to justify it.

### Step 2: Write the simplest code possible to pass the test (GREEN)
This is the second reason why TDD is so peculiar at first. It is likely that the simplest code possible is also, initially, the wrong code. Yet we write it anyway. The reason is, at this point, our only motivation is to pass the test. We make no assumptions about future requirements of the code. Future requirements will only be satisfied when they are proven by the introduction of another test.

### Step 3: Clean up (REFACTOR)
The final step is to double check that all current tests are still passing and to tidy up and improve the structure of the code (without adding any additional functionality) where appropriate. We can improve the code with considerable confidence, because running our tests will always prove that the current expectations of the code are being met.

### Step 4: Repeat until all expectations have been specified.
Choose the next expectation and return to Step 1. This process is also known as:

RED - GREEN - REFACTOR