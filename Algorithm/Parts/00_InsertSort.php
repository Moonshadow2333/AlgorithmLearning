<?php

function insertSort ($arr) {
    // arr[0,...,i) 有序，arr[i,...,len - 1] 无序
    // 用指针 i 指向第一个
    for ($i = 0; $i < count($arr); $i ++) {
        // 暂存 arr[$i]
        $t = $arr[$i];
        // 把 arr[$i] 放到arr[0,i)中合适的位置
        for ($j = $i; $j - 1 >= 0 && $t < $arr[$j - 1]; $j--) {
            $arr[$j] = $arr[$j - 1];
        }
        /*
            当内层循环终止的时候，j 的值是什么？
            循环继续的条件是 j - 1 >= 0 && t < arr[j - 1]
            那么循环终止的条件则是 j - 1 < 0 || t >= arr[j - 1]
            又因为 j >= 0，则 j = 0 是终止循环的条件之一；
            t >= arr[j - 1]，这个得具体分析，例如 [1, 3, 4, 2] 假如 t = 2，2 >= arr[j - 1]，那么 2 >= arr[0]，即 j - 1 = 0 j = 1
            换句话说，当循环终止的时候，j 要么是 0，要么是第一个比 t 小的元素所在的位置加一。
        */
        $arr[$j] = $t; 
    }
    return $arr;
}

$arr = [1, 3, 4, 2, -1];
$res = insertSort($arr);
var_dump($res);