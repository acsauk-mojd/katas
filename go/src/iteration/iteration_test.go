package iteration

import "testing"

func TestRepeat(t *testing.T) {

	t.Run("repeat  x amount of times", func(t *testing.T) {
		repeated := Repeat("a", 10)
		expected := "aaaaaaaaaa"

		if repeated != expected {
			t.Errorf("expected %q but got %q", expected, repeated)
		}
	})

	t.Run("try repeat 0", func(t *testing.T) {
		repeated := Repeat("b", 0)
		expected := ""

		if repeated != expected {
			t.Errorf("expected %q but got %q", expected, repeated)
		}
	})

}
