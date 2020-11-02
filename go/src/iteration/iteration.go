package iteration

func Repeat(x string) string {
	answer := ""
	for i := 0; i < 5; i++ {
		answer = answer + x
	}
	return answer
}
