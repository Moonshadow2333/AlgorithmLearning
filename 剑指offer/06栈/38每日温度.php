<?php

function dailyTemperatures($temperatures){
	$count  = count($temperatures);
	$result = array_fill(0,$count,0);
	$stack  = [];
	for($i=0;$i<$count;$i++){
		$temperature = $temperatures[$i];
		while(!empty($stack) && $temperature > $temperatures[array_peek($stack)]){
			$pre = array_pop($stack);
			$result[$pre] = $i - $pre;
		}
		array_push($stack,$i);
	}
	return $result;
}

function array_peek(array $arr){
	return $arr[count($arr)-1];
}

$temperatures = [35,31,33,36,34];
$re = dailyTemperatures($temperatures);
var_dump($re);
// 用给定的值填充数组
// $arr = array_fill(0, 5, 0);
// var_dump($arr);