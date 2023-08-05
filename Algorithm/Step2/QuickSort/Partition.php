<?php

$arr = [2, 3, 4, 1, 0, -3];

// for ($i) {}

function partition($arr) {
    $l = 0;
    $larr = $rarr = [];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] <= $arr[$l]) {
            $larr[] = $arr[$i];
        } else {
            $rarr[] = $arr[$i];
        }
    }
    $re = array_merge(array_merge($larr, [$arr[$l]]), $rarr);
    var_dump($re);
    return count($larr);
}

function partition2 ($arr) {
    // 原地分割
    // arr[l+1,...,j] <= v; arr[j+1,...,i-1] > v
    $l = 0;
    $j = 0;
    for ($i = 1; $i < count($arr); $i ++) {
        if ($arr[$i] <= $arr[$l]) {
            $j++;
            $temp = $arr[$j];
            $arr[$j] = $arr[$i];
            $arr[$i] = $temp;
        }
    }
    $temp1 = $arr[$l];
    $arr[$l] = $arr[$j];
    $arr[$j] = $temp1;
    var_dump($arr);
    return $j;
}

function swap ($arr, $a, $b) {
    $temp = $arr[$a];
    $arr[$a] = $arr[$b];
    $arr[$b] = $temp;
    return $arr;
}

$re = partition2($arr);
echo $re;