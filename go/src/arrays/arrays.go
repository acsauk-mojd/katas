package arrays

func Sum(nums []int) int {
	sum := 0
	for _, num := range nums {
		sum += num
	}
	return sum
}

func SumAllTails(numbersToSum ...[]int) []int {
	answer := []int{}

	for _, numbers := range numbersToSum {
		if len(numbers) == 0 {
			answer = append(answer, 0)
		} else {
			answer = append(answer, Sum(numbers[1:]))
		}

	}

	return answer
}
