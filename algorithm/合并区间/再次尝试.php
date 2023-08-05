<?php
function merge(array $arr){
	$count = count($arr);
	$i=0;
	$result = [];
	while($i<$count){
		$left = $arr[$i][0];
		$right = $arr[$i][1];
		while($i+1<$count && $right>$arr[$i+1][0]){
			$right = $arr[$i+1][1];
			// $result[] = [$left,$right];
			$i++;
		}
		$result[] = [$left,$right];
		$i++;
	}
	return $result;
}

$arr=[[10,30],[20,60],[80,100],[150,180]];
$re=merge($arr);
var_dump($re);