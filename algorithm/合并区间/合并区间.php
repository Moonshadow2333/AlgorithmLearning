<?php
function merge($intervals){
		$len = count($intervals)-1;
		$i = 0;
		$result = [];
		while($i<=$len){
			$left = $intervals[$i][0];
			$right = $intervals[$i][1];
			while($i<=$len-1 && $intervals[$i+1][0]<=$right){
				$right = max($right,$intervals[$i+1][1]); 
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