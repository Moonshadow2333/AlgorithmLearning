<?php

$arr = [4, 2, 1];

// 把 1 插入到 arr[1] 的位置
$len = count($arr);
for($i = $len - 1; $i+1 >= 1; $i--){
    $arr[$i + 1] = $arr[$i];
}
$arr[1] = 1;
var_dump($arr);