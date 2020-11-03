package arrays

func Sum(nums []int) int {
	sum := 0
	for _, num := range nums {
		sum += num
	}
	return sum
}

func SumAllTails(numbersToSum ...[]int) []int {
	var answer []int

	for _, numbers := range numbersToSum {
		slice := numbers[0]
		answer = append(answer, (Sum(numbers) - slice))
	}

	return answer
}
