<?php
function dc($row,$col,$v,$w){
	$results = [];
	// for($i=0;$i<=$rows;$i++){
	// 	for($j=0;$j<=$cols;$j++){
	// 		// echo $i.'-'.$j."\n";
	// 		$results[$i][$j] = 0;
	// 	}
	// }
	if ($results[$row][$col] != null){
		return $results[$row][$col];
	} 
	if($row == 0 || $col == 0){
		$result = 0;
	}
	if($w[$row]>$col){
		$result = dc($row-1,$col,$v,$w);
	}else{
		$temp1 = dc($row-1,$col,$v,$w);
		$temp2 = dc($row-1,$col-$w[$row],$v,$w) + $v[$row];
		$result = max($temp1,$temp2);
	}
	$results[$row][$col] = $result;
	return $results;
}
$v = [0,3000,2000,1500];
$w = [0,4,3,1];
$re = dc(3,3,$v,$w);
var_dump($re);