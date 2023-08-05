<?php

function prefix($arr, $k)
{
    $prefix = [0=>0];
    $ans    = 0;
    $sum_j  = 0;
    array_unshift($arr, 0);
    for ($j=1;$j<count($arr);$j++) {
        $sum_j += $arr[$j];
        $sum_i = $sum_j - $k;
        if (array_key_exists($sum_i, $prefix)) {
            $ans++;
        }
        $prefix[$sum_j] = getOrDefault($prefix, $sum_j) + 1;
    }
    return $ans;
}

function getOrDefault($arr, $key, $default = 0)
{
    if (array_key_exists($key, $arr)) {
        return $arr[$key];
    } else {
        return $default;
    }
}

$arr = [1,6,2,5,4,2];
$k = 8;
$re = prefix($arr, $k);
var_dump($re);
