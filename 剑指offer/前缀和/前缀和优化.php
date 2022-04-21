<?php

class PrefixSum{
	public $nums;
	public $k;
	public function __construct(array $nums,$k){
		$this->nums = $nums;
		$this->k    = $k; 
	}
	public function subArraySum(){
		$preSum = [0=>1];
		$ans    = 0;
		$sum0_i = 0;
		for($i=0;$i<count($this->nums);$i++){
			$sum0_i += $this->nums[$i];
			$sum0_j  = $sum0_i - $this->k;
			if(array_key_exists($sum0_j,$preSum)){
				$ans += $preSum[$sum0_j];
			}  
			if(array_key_exists($sum0_i,$preSum)){
				$preSum[$sum0_i] = $preSum[$sum0_i] + 1;
			}else{
				$preSum[$sum0_i] = 1;
			}
		}	
		return $ans;
	}		
}
$obj = new PrefixSum([1,6,2,2,4,2],8);
$re = $obj->subArraySum();
// var_dump($re);