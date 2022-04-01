<?php

function starCollision($stars){
	$stack = [];
	for($i=0;$i<=count($stars)-1;$i++){
		$star = $stars[$i];
		while (!empty($stack) && array_peek($stack) > 0 && array_peek($stack) < -$star) {
			array_pop($stack);
		}
		if(!empty($stack) && $star < 0 && array_peek($stack) == $star){
			array_pop($stack);
		}elseif($star>0 || empty($stack) || array_peek($stack) < 0){
			array_push($stack,$star);
		}
	}
	return $stack;
}

function array_peek(array $arr){
	return $arr[count($arr)-1];
}

$stars = [4,5,-6,4,8,-5];
$re = starCollision($stars);
var_dump($re);