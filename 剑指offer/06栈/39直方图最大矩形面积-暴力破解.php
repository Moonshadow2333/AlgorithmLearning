<?php

function largestRectangleArea($heights){
	$maxArea = 0;
	for($i=0;$i<count($heights);$i++){
		$min = $heights[$i];
		for($j=$i;$j<count($heights);$j++){
			// 找到下标从 i 到 j 最小的高度
			$min = min($min,$heights[$j]);
			$area = $min * ($j - $i + 1);
			$maxArea = max($maxArea,$area);
		}
	}
	return $maxArea;
}

$heights = [3,2,5,4,6,1,4,2];
$re = largestRectangleArea($heights);
echo $re;