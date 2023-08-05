<?php
function searchMax($n,$arr){
    if($n == 0){
        return $arr[0];
    }else{
        if($arr[$n]>searchMax($n-1,$arr)){
            return $arr[$n];
        }else{
            return searchMax($n-1,$arr);
        }
    }
}
$arr = [1,5,2,10,3,12,11,12];
$re = searchMax(count($arr)-1,$arr);
echo $re;