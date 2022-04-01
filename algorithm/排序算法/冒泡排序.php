<?php
function f($arr)
{
    $len = count($arr);
    for ($i=0;$i<$len;$i++) {
        for ($j=$i+1;$j<$len;$j++) {
            if($arr[$i]>$arr[$j]){
                $tep = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $tep;
            }
        }
    }
    return $arr;
}
$arr = [5,3,6,2,10,15,-1,0,-19];
$re = f($arr);
var_dump($re);