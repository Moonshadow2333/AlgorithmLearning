<?php

function shellSort ($arr) {
    $h = floor(count($arr) / 2);
    while ($h >= 1) {
        for ($start = 0; $start < $h; $start ++) {
            /*
                分组不是广义上的分组概念，即拆分成四个数组，而是用索引之间的规律来分组
                进行分组的过程，以 [1, 3, 4, 2, 8, 5, 7, 6] 为例，
                第一次分成了四个组：
                0 4
                1 5
                2 6
                3 7

                第二次分成了两个组
                0 2 4 6
                1 3 5 7

                第三次分成了一个组
                0 1 2 3 4 5 6 7

            */ 
            for ($i = $start + $h; $i < count($arr); $i += $h) {
                $t = $arr[$i];
                for ($j = $i; $j - $h >= 0 && $t < $arr[$j - $h]; $j -= $h) {
                    $arr[$j] = $arr[$j - $h];
                }
                $arr[$j] = $t;
            }
        }
        $h = floor($h / 2);
    }
    return $arr;
}

$arr = [1, 3, 4, 2, 8, 5, 7, 6];
$res = shellSort($arr);
var_dump($res);