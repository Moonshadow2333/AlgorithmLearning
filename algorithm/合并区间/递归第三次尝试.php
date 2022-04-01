<?php
/*
    简化工作
*/ 
function merge($arr)
{
    if (empty($arr)) {
        return [];
    }
    $car = array_shift($arr);
    $result = updateRight($arr, $car[1]);
    return array_merge([[$car[0],$result['right']]], merge($result['arr']));
}
function updateRight($arr, $right)
{
    if (empty($arr) || $right < $arr[0][0]) {
        return ['arr'=>$arr,'right'=>$right];
    } else {
        $right = $arr[0][1];
        array_shift($arr);
        return updateRight($arr, $right);
    }
}
$arr=[[10,30],[20,60],[50,100],[90,180]];
// $arr=[[10,30],[20,60],[80,100],[150,180]];
$re=merge($arr);
var_dump($re);
/*
    疑问？
    1. 为啥在updateRight函数中处理过了$arr,即在updateRight函数中使用了array_shift($arr);但是在merge函数中的$arr却没有影响？ 我觉得和定义域有关，以后再说吧。
*/
