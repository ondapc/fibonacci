<?php
// V1 FIBONACCI - FIND THE Nth FIBONACCI NUMBER SERIES
function fibonacci_series_v02($n) {
	$f1 = -1;
	$f2 = 1;
	$res = array();
	for ($i = 0; $i <= $n; $i++) {
		$f = $f1 + $f2;
		$f1 = $f2;
		$f2 = $f;
		$res[] = $f; 
	}
	return $res;
}
// V2 FIBONACCI - FIND THE Nth FIBONACCI NUMBER SERIES
function fibonacci_series_v04($n) {	
	$fib = array(0,1);
	for($i = 1; $i < $n; $i++) {
		$fib[] = array_sum(array_slice($fib, -2));
	}
	return $fib;
}

// V3 FIBONACCI - FIND THE Nth FIBONACCI NUMBER SERIES
function fibonacci_series_v03($pos){
	$fibarray = array(0, 1);
	for ( $i=2; $i<=$pos; ++$i ) {
		$fibarray[$i] = $fibarray[$i-1] + $fibarray[$i-2];
	}
	return $fibarray;
}


// FIND THE Nth FIBONACCI NUMBER
function getFibonacciNumber($n) {
    return round(pow((sqrt(5)+1)/2, $n) / sqrt(5));
}
?>
