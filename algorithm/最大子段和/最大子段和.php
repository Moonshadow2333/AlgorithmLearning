<?php
class Solution {
 
    function maxSum($nums, $start, $end){
        if($start === $end){
            return $nums[$start];
        }
 
        $mid = intval(($start+$end)/2);
        $lsum = $this->maxSum($nums, $start, $mid);//左边的
        $rsum = $this->maxSum($nums, $mid+1, $end);//右边的
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
 
        return max($lsum, max($msum, $rsum));
    }
 
    function maxSubArray($nums){
        $len = count($nums);
 
        return $this->maxSum($nums, 0, $len-1);
 
    }
}

$o = new Solution();
$arr = array();
    for($i=0;$i<2000000;$i++){
        $num = rand(-100,100);
        $arr[] = $num;
    }
$r = $o->maxSubArray($arr);
// unset($arr);
echo $r;
