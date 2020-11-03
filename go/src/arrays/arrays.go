package arrays

func Sum(nums []int) int {
	sum := 0
	for _, num := range nums {
		sum += num
	}
	return sum
}

func SumAll(numbersToSum ...[]int) []int {
	var answer []int

	for _, numbers := range numbersToSum {
		answer = append(answer, Sum(numbers))
	}

	return answer
}
