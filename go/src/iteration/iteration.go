package iteration

import "testing"

func Repeat(x string, repetitions int) string {
	answer := ""
	for i := 0; i < repetitions; i++ {
		answer += x
	}
	return answer
}

func ExampleRepeat(b *testing.B) {

}
