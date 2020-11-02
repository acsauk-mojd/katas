package arrays

func Sum(x [5]int) int {
	answer := 0
	for i := 0; i < 5; i++ {
		answer += x[i]
	}
	return answer
}
