<?php

class PrefixSum{
	public $nums;
	public $k;
	public function __construct(array $nums, $k){
		$this->nums = $nums;
		$this->k    = $k;
	}
	public function subArraySum(){
		$sum = [0];
		for ($i=0; $i<count($this->nums); $i++) { 
			$sum[$i+1] = $sum[$i] + $this->nums[$i];
		}
		$ans = 0;
		for($i=1;$i<count($sum);$i++){
			for($j=0;$j<$i;$j++){
				if($sum[$i] - $sum[$j] == $this->k){
					$ans++;
				}
			}
		}
		return $ans;
	}
}
$obj = new PrefixSum([1,6,2,5,4,2],8);
$re = $obj->subArraySum();
var_dump($re);