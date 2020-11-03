package arrays

func Sum(nums ...int) {
	sum := 0
	for _, num := range nums {
		sum += num
	}
	return sum
}

func SumAll(x, y []int) []int {
	a := Sum(x)
	b := Sum(y)
	ans := []int{a, b}
	return ans
}
