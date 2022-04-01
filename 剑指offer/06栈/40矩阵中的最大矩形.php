<?php
include('./39直方图最大矩形面积-单调栈法.php');
function maximalRectangle($matrix){
	$count = count($matrix);
	if($count == 0 || count($matrix[0]) == 0){
		return 0;
	}
	$heights = array_fill(0,count($matrix[0]),0);
	$maxArea = 0;
	for($i=0;$i<$count;$i++){
		for($j=0;$j<count($matrix[$i]);$j++){
			if($matrix[$i][$j] == 0){
				$heights[$j] = 0;
			}else{
				$heights[$j] += 1; 
			}
		}
		$maxArea = max($maxArea,largestRectangleArea($heights));
	} 
	return $maxArea;
}

$matrix = [
	[1,0,1,0,0],
	[0,0,1,1,1],
	[1,1,1,1,1],
	[1,0,0,1,0]
];
$re = maximalRectangle($matrix);
var_dump($re);