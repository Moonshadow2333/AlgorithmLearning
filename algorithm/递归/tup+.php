<?php
function tup($tup1, $tup2)
{
    // if(!$tup1 && !$tup2){
    //     return [];
    if (!$tup1) {
        return $tup2;
    }elseif(!$tup2){
        return $tup1;
    }else{
        $e = [array_shift($tup1) + array_shift($tup2)];
        return array_merge(tup($tup1, $tup2),$e);
    }
}
/*
    $tup1 = [3,4,2];
    $tup2 = [2,1,3];
   array_merge(tup([4,2], [1,3]),3+2);
   array_merge(array_merge(tup([2], [3]),4+1),3+2);
   array_merge(array_merge(array_merge(tup([], []),3+2),2+3),4+1),3+2);
   array_merge(array_merge(array_merge([],2+3),2+3),4+1),3+2);

*/ 
$tup1 = [3,4,2];
$tup2 = [2,1,3,9,0];
$re = tup($tup1, $tup2);
var_dump($re);
// $arr1 = [2,3,4];
// $arr1 = []; 
// $e = array_shift($arr1);
// echo $e;
// var_dump($arr1);
// array_push($arr1,9);
// var_dump($arr1);
/*
    描述：
    输入两个等长的数组，输出一个新数组。
    新数组的第一个元素为tup1的第一个元素 + tup2第一个元素，新数组的第二个元素为tup1的第二个元素 + tup2第二个元素，...，新数组的第n个元素为tup1的第n个元素 + tup2第n个元素。
    例子：
    $tup1 = [3,4,2];
    $tup2 = [2,1,3];
    tup($tup1, $tup2) 
    输出：[5,5,5];
*/
