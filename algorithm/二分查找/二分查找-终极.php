<?php
function search($start,$end,$arr,$a){
	if(empty($arr) || $start>$end){
		return '没有找到'.$a;
	}else{
		$mid = floor(($start+$end)/2);
		$guess = $arr[$mid];
		if($guess < $a){
			$start = $mid + 1;
			return search($start,$end,$arr,$a);
		}elseif($guess === $a){
			$first = $fin = $mid;
			while($first-1 >= 0 && $arr[$first-1] === $a){
				$first--;
			}
			while($fin+1 <= $end && $arr[$end+1] === $a){
				$fin++;
			}
			if($first === $fin){
				return $first;
			}
			return [$first,$fin];
		}elseif($guess > $a){
			$end = $mid - 1;
			return search($start,$end,$arr,$a);
		}
	}
}

$arr = [];
for ($i=0;$i<1000;$i++) {
    $arr[] = rand(-1000, 1000);
}
sort($arr);
var_dump($arr);
// exit;
$start = 0;
$end = count($arr)-1;
$a = 101;
$re = search($start,$end,$arr,$a);
var_dump($re);