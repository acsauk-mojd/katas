class Scrabble {

    static calculate(input) {
        const result = [];
        const ONE_POINT = ['A', 'E', 'I', 'O', 'U', 'L', 'N', 'R', 'S', 'T'];
        const TWO_POINT = ['D', 'G'];
        const THREE_POINT = ['B', 'C', 'M', 'P'];
        const FOUR_POINT = ['F', 'H', 'V', 'W','Y'];
        const FIVE_POINT = ['K'];
        const EIGHT_POINT = ['J', 'X'];
        const TEN_POINT = ['Q', 'Z'];

        const inputArray = input.split("");
        inputArray.forEach((letter) => {
            ONE_POINT.includes(letter) ? result.push(1) : null;
            TWO_POINT.includes(letter) ? result.push(2) : null;
            THREE_POINT.includes(letter) ? result.push(3) : null;
            FOUR_POINT.includes(letter) ? result.push(4) : null;
            FIVE_POINT.includes(letter) ? result.push(5) : null;
            EIGHT_POINT.includes(letter) ? result.push(8) : null;
            TEN_POINT.includes(letter) ? result.push(10) : null;
        })
        return result.reduce((value, total) => value + total);
    };
}

module.exports = Scrabble;