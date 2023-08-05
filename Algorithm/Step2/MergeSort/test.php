<?php
function mergeSortedArr($arr1, $arr2)
{
    $arr = [];
    $len1 = count($arr1);
    $len2 = count($arr2);
    $len = $len1 + $len2;
    $k = $i = $j = 0;

    while($k < $len) {
        if ($i >= $len1 ) {
            $arr[] = $arr2[$j];
            $j ++;
        } elseif ($j >= $len2) {
            $arr[] = $arr1[$i];
            $i++;
        } elseif ($arr1[$i] <= $arr2[$j]) {
            $arr[] = $arr1[$i];
            $i ++;
        } elseif ($arr1[$i] > $arr2[$j]) {
            $arr[] = $arr2[$j];
            $j ++;
        }
        $k ++;
    }
    return $arr;
}

function merge($arr, $l, $mid, $r)
{
    $temp = copyOfRange($arr, $l, $r + 1);
    $i = $l;
    $j = $mid + 1;
    for ($k = $l; $k <= $r; $k++) {
        if ($i > $mid) {
            $arr[$k] = $temp[$j - $l];
            $j ++;
        } elseif ($j > $r) {
            $arr[$k] = $temp[$i - $l];
            $i ++;
        } elseif ($temp[$i - $l] <= $temp[$j - $l]) {
            $arr[$k] = $temp[$i - $l];
            $i ++;
        } else {
            $arr[$k] = $temp[$j - $l];
            $j ++;
        }
    }
    return $arr;
}

function copyOfRange($arr, $l, $r)
{
    $temp = [];
    for ($i = $l; $i < $r; $i++) {
        $temp[] = $arr[$i];
    }
    return $temp;
}

// $arr1 = [1, 2, 4];
// $arr2 = [3, 5];

// $arr = mergeSortedArr($arr1, $arr2);
// var_dump($arr);

$arr = [1, 2, 4, 3, 5];
$re = merge($arr, 0, 2, 4);
var_dump($re);