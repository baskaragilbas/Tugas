package main

import (
	"fmt"
	"math"
)

func main() {
	var i float64
	fmt.Scan(&i)
	b := math.Floor(math.Log10(i))
	for b >= 0 {
	  c:=math.Pow(10,b)
	  fmt.Println(i-math.Mod(i,c))
	  i=math.Mod(i,c)
		b--
	}
}