<?php
function search($name,$graph){
	// 搜索一环。
	$search_queue = $graph[$name];
	$searched = [];
	$sellers = [];
	while(!empty($search_queue)){
		$person = array_shift($search_queue);
		if(!in_array($person, $searched)){
			if(find($person)){
				$sellers[] = $person; 
			}else{
				$neighbors = $graph[$person];
				if(!is_null($neighbors)){
					for($i=0;$i<count($neighbors);$i++){
						array_push($search_queue,$neighbors[$i]);
					}
				}
				$searched[] = $person;
			}
		}
	}
	return $sellers;
}
function find($person){
	if(substr($person, -1) === 'm'){
		return true;
	}else{
		return false;
	}
}
$graph = [
	'you' => [
		'Claire',
		'Alice',
		'Bob'
	],
	'Claire' => [
		'Thon',
		'Jonny'
	],
	'Alice' => [
		'Peggy'
	],
	'Bob' => [
		'Peggy',
		'Aunj'
	],
	'Aunj' => [],
	'Peggy' => [],
	'Thon' => [],
	'Jonny' => []
];
$re = search('you',$graph);
if(!empty($re)){
	foreach($re as $name){
		echo $name.' is a mongo seller!'."\n";
	}
}else{
	echo 'there is no mongo seller';
}
// $neighbors = $graph['Bob']['Aunjm'];
// var_dump($neighbors);