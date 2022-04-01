<?php
function sum($n,$arr)
{
    if($n==0){
        return $arr[0];
    }else{
        return $arr[$n] + sum($n-1,$arr);
    }
}
$arr = [1,2,3,4,5];
$re = sum(2,$arr);
echo $re;