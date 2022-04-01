<?php
function merge(array $arr){
	$count = count($arr);
	$i=0;
	$result = [];
	while($i<$count){
		$left = $arr[$i][0];
		$right = $arr[$i][1];
		// echo $left.'-'.$right."\n";
		// echo $i."\n";
		// if($count === 1){
		// 	$result[] = [$left,$right];
		// }
		if($i+1<$count){
			if($right<$arr[$i+1][0]){
				echo 111;
				$result[] = [$left,$right]; 
			}elseif($right >= $arr[$i+1][0]){
				while($arr[$i+1][1]>=$arr[$i+2][0] && $i+2<$count){
					$right = $arr[$i+2][1];
					$i++;
				}
				$result[] = [$left,$right];
			}
		}else{
			$result[] = [$left,$right];
		}
		
		$i++;
	}
	return $result;
}
$arr = [[10,20],[18,25],[23,26],[26,27]];
$re = merge($arr);
var_dump($re);