<?php
function merge($arr){
	if(empty($arr)){
		return [];
	}
	$car = array_shift($arr);
	$left = $car[0];
	$right = $car[1];
	while(!empty($arr) && $right >= $arr[0][0]){
		$right = $arr[0][1];
		array_shift($arr);
	}
	return array_merge([[$left,$right]],merge($arr));
}

// $arr=[[10,30],[20,60],[50,100],[90,180]];
$arr=[[10,30],[20,60],[80,100],[150,180]];
// $re=merge($arr);
// var_dump($re);
$a = null;
if(0>$a){
	echo 'true';
}
$arr = [];
array_shift($arr);
var_dump($arr);
var_dump($arr[0]);
/*
	array_shift()函数删除数组的第一个元素。
	注意： 
	1. 返回从数组中删除元素的值，如果数组为空则返回 NULL。 
	2. 如果数组为空数组，那么剩余数组依然是空数组。
	3. NULL和0的关系。 
*/ 