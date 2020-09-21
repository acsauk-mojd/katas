const Scrabble = require('./Scrabble');

test('Letters worth 1 point return 1 point', () =>  {
    let points = Scrabble.calculate('a');
    expect(points).toEqual(1);
})