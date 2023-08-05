<?php

function evalRPN($data){
	$stack = [];
	for ($i=0; $i < count($data); $i++) { 
		echo $data[$i]."\n";
		switch ($data[$i]) {
			case '+':
			case '-':
			case '*':
			case '/':
				$num1 = array_pop($stack);
				$num2 = array_pop($stack);
				array_push($stack,calculate($num1,$num2,$data[$i]));
				break;		
			default:
				array_push($stack, $data[$i]);
				break;
		}
	}
	return array_pop($stack);
}

function calculate($num1,$num2,$token){
	switch($token){
		case '+':
			return $num1 + $num2;
		case '-':
			return $num1 - $num2;
		case '*':
			return $num1 * $num2;
		case '/':
			return $num1 / $num2;
		default:
			return 0;
	}
}

$data = [2,1,3,'*','+'];
$re = evalRPN($data);
echo $re;