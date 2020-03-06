import Game from '../src/Game';

describe('Game', () => {
  describe('score', () => {
    test('returns 0 at start of game', () => {
      let game = new Game();
      expect(game.score()).toBe(0);
    })

    test('returns 1 when a player has scored one', () => {
      let game = new Game();
      game.total = 1;
      expect(game.score()).toBe(1);
    })
  })

  describe('roll', () => {
    test('takes an int', () => {
        let game = new Game()
        expect(game.roll(5)).not.toThrow(new Error())
    })
  })
});
