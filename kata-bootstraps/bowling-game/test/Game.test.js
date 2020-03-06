import Game from '../src/Game';

describe('Game', () => {
  describe('Score', () => {
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
});
