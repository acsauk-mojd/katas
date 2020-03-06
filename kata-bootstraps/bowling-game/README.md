# Jest unit tests

This folder contains a unit test template for [Jest](https://facebook.github.io/jest).

Configured to support ES6 syntax using Babel (preset `es2015`)

## Installation

```bash
npm install
```

## Running the tests

```bash
npm test
```

Or you can use built-in watch mode:

```bash
npm run test:watch
```

## Show coverage

```bash
npm run test:cover
```

Note: coverage is also included in watch mode.

# Bowling Rules
The game consists of 10 frames. In each frame the player has two rolls to knock down 10 pins. The score for the frame is the total number of pins knocked down, plus bonuses for strikes and spares.

A spare is when the player knocks down all 10 pins in two rolls. The bonus for that frame is the number of pins knocked down by the next roll.

A strike is when the player knocks down all 10 pins on his first roll. The frame is then completed with a single roll. The bonus for that frame is the value of the next two rolls.

In the tenth frame a player who rolls a spare or strike is allowed to roll the extra balls to complete the frame. However no more than three balls can be rolled in tenth frame.

## Requirements
Write a class Game that has two methods

void roll(int) is called each time the player rolls a ball. The argument is the number of pins knocked down.

int score() returns the total score for that game.

- Game class with roll and score methods
- Idea of a frame
    - two rolls normally
    - three rolls if they hit a strike/spare on their 10th frame
- Keep track of frames completed
- Idea of a spare
    - knock down 10 in two rolls
    - bonus for that frame is the number of pins knocked down by the next roll
- Idea of a strike
    - knock down 10 in one rolls
    - The bonus for that frame is the value of the next two rolls
