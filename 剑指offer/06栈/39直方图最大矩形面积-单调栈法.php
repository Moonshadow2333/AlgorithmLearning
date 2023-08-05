<?php

function largestRectangleArea($heights){
	$stack = [-1];
	$count = count($heights);
	$maxArea = 0;
	for($i=0;$i<$count;$i++){
		while(array_peek($stack) != -1 && $heights[$i] <= $heights[array_peek($stack)]){
			$height = $heights[array_pop($stack)];
			$width  = $i - array_peek($stack) - 1;
			$maxArea = max($maxArea,$height * $width);
		}
		array_push($stack,$i);
	}
	while(array_peek($stack) != -1){
		$height = $heights[array_pop($stack)];
		$width  = $count - array_peek($stack) -1;
		$maxArea = max($maxArea,$height *$width);
	}
	return $maxArea;
}

// $heights = [3,2,5,4,6,1,4,2];
// $re = largestRectangleArea($heights);
// var_dump($re);
function array_peek(array $arr){
	return $arr[count($arr)-1];
}