import Game from '../src/Game';

test('Game', () => {
  describe('Score', () => {
    describe('returns 0 at start of game', () => {
      expect(Game.score()).toBe(0);
    })
  })

});
