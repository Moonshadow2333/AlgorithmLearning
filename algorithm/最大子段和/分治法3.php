<?php

class Solution {
 
    function maxSum($nums, $start, $end){
        if($start === $end){
            return $nums[$start];
        }
 
        $mid = intval(($start+$end)/2);
        
        $t = 0;//计算中间部分的
        $t1 = PHP_INT_MIN;
        $t2 = PHP_INT_MIN;
        for($i=$mid; $i>=$start; $i--){
            $t += $nums[$i];
            if($t > $t1){
                $t1 = $t;
            }
        }
 
        $t = 0;
        for($i=$mid+1; $i<=$end; $i++){
            $t += $nums[$i];
            if($t > $t2){
                $t2 = $t;
            }
        }
 
        $msum = $t1 + $t2;
        $lsum = $this->maxSum($nums, $start, $mid);//左边的
        $rsum = $this->maxSum($nums, $mid+1, $end);//右边的
        return max($lsum, max($msum, $rsum));
    }
 
    function maxSubArray($nums){
        $len = count($nums);
 
        return $this->maxSum($nums, 0, $len-1);
 
    }
}
$arr = array(2,-5,4,3);
// $arr = array(2,-4,3,-1,2,-4,3);
// $arr = array(2,-5,4,3,-2,-1);

$obj = new Solution();
echo $obj->maxSubArray($arr);