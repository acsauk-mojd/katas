package arrays

func Sum(x []int) int {
	answer := 0
	for i := 0; i < len(x); i++ {
		answer += x[i]
	}
	return answer
}

func SumAll(x, y []int) []int {
	return []int{Sum(x), Sum(y)}
}
