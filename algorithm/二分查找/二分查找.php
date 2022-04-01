<?php
/*
    问题描述：
    首先说下二分查找，需要在数组的数据结构上应用，而且前提是这个数组是有序的。不管是升序还是降序。一般数组的查找都是顺序查找，也就是逐个比对。而二分查找是分治思想的一个代表性应用。大概思想是  拿所想找的数字，去和数组中间的值比较。如果相等，直接返回KEY值，如果大于，拿右边的数组再去进行一分为二。如果小于，拿左边的数组进行对比。知道数组为空。下面看具体代码实现。
    1、目的： 有序数组中查找特定元素。
    2、实现：中目比较。（目标元素和数组的中间元素进行比较）
    2.1 如果目标元素小于中间元素的值，就在[0...mid]中查找。
    2.2 如果目标元素大于中间元素的值，就在[mid+1...count(arr)-1]中查找。

    // 假设数组中存在目标元素。
    // 1.递归终止条件：目标元素和中间元素相等。
    // 2.递推表达式：
    if($number == $mid){
        return '';
    }elseif($number < $mid){
        find($arr,$number,$start,$mid);
    }elseif($number > $mid){
        find($arr,$number,$mid+1,$end);
    }
    // 3.返回值：

*/
function find($arr, $number, $start, $end)
{
    $mid = intval(($start+$end)/2);
    if ($mid <= 1) {
        return  $number.'没找到';
    }
    if ($number === $arr[$mid]) {
        return $number.'的键为'.$mid;
    } elseif ($number < $arr[$mid]) {
        return find($arr, $number, $start, $mid);
    } elseif ($number > $arr[$mid]) {
        return find($arr, $number, $mid+1, $end);
    }
}
function quick($arr)
{
    if (count($arr)<=1) {
        return $arr;
    }
    // $mid = intval(count($arr)/2);
    $mid = $arr[0];
    $Lset = $Rset = [];
    for ($i=1;$i<=count($arr)-1;$i++) {
        if ($arr[$i]<$mid) {
            $Lset[] = $arr[$i];
        } else {
            $Rset[] = $arr[$i];
        }
    }
    $L = quick($Lset);
    $R = quick($Rset);
    return array_merge($L, array($mid), $R);
}
function binarySearch($number, $arr, $endKey)
{
    $halfKey = ceil($endKey /2);
    if ($halfKey < 0) {
        return  $number.'没找到';
    }
    if ($number == $arr[$halfKey]) {
        return  $number.'下标为'.$halfKey;
    } elseif ($number <$arr[$halfKey]) {
        //传递左边数组进行，查找
        return binarySearch($number, $arr, $halfKey -1);
    } else {
        //传递右边数组进行，查找
        return binarySearch($number, $arr, $endKey + 1);
    }
}
function f($array, $low, $high, $k)
{
    if ($low <= $high) {
        $mid = intval(($low+$high)/2);
        if ($array[$mid] == $k) {
            return $mid;
        } elseif ($k < $array[$mid]) {
            return f($array, $low, $mid-1, $k);
        } else {
            return f($array, $mid+1, $high, $k);
        }
    }
    die('Not have...');
}
   
// $arr = [];
// for ($i=0;$i<200000;$i++) {
//     $arr[] = rand(-20000, 400000);
// }
// $arr= quick($arr);
// var_dump($arr);
$arr = [2,3,5,5,6,7,9];
$num = 5;
// $re = binarySearch($num, $arr, count($arr)-1);
$re = f($arr,0,count($arr),$num);
echo $re;
