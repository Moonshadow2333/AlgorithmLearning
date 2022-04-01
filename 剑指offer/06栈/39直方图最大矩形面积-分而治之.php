<?php

function largestRectangleArea($data){
	$count = count($data);
	if($count == 0){
		return 0;
	}
	if($count == 1){
		return $data[0] * 1;
	}
	$smallest = 100000;
	for($i=0;$i<$count;$i++){
		if($data[$i]<$smallest){
			$smallest = $data[$i];
			$index    = $i; 
		}
	}
	$left = $right = [];
	for($i=0;$i<$count;$i++){
		if($i < $index){
			$left[]  = $data[$i];
		}elseif($i > $index){
			$right[] = $data[$i];
		}
	}

	
	$mid = $smallest * $count;
	$leftArea  = largestRectangleArea($left);
	$rightArea = largestRectangleArea($right);
	return  max($mid,$leftArea,$rightArea);
}

$data = [3,2,5,4,6,1,4,2];
$re = largestRectangleArea($data);
var_dump($re);