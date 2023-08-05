<?php

class SelectSort
{
    private function __construct()
    {
    }
    public static function testSort(array $arr)
    {
        //循环不变量 arr[i...n)未排序，arr[0,i)已排序
        $min = 99999999;
        $minIndex = 0;
        for($i=0; $i<count($arr); $i++){
            for($j=$i; $j<count($arr); $j++){
                if ($arr[$j] <= $min) {
                    $min = $arr[$j];
                    $minIndex = $j;
                }
            }
            //arr[i...n)中的最小值要放到arr[i]的位置
            $arr[$minIndex] = $arr[$i];
            $arr[$i] = $min;
            $min = 99999999;
        }
        return $arr;
    }
    
    public static function sort(array $arr){
        for ($i = 0; $i < count($arr); $i++) {
            $minIndex = $i;
            for ($j = $i; $j < count($arr); $j++) {
                if ($arr[$j] < $arr[$minIndex]) {
                    $minIndex = $j;
                }
            }
            $t = $arr[$minIndex];
            $arr[$minIndex] = $arr[$i];
            $arr[$i] = $t;
        }
        return $arr;
    }

    public static function anOtherSort(array $arr){
        // a[i,...,n)已排序， a[0,...,i)未排序
        for ($i=count($arr)-1; $i>=0; $i--) {
            $maxIndex = $i;
            for ($j=$i; $j>=0; $j--) {
                if ($arr[$j] > $arr[$maxIndex]) {
                    $maxIndex = $j;
                }
            }
            $t = $arr[$i];
            $arr[$i] = $arr[$maxIndex];
            $arr[$maxIndex] = $t;
        }
        return $arr;
    }
}

$arr = [9,2,56,57,23,6,67];
// $re = SelectSort::testSort($arr);
// var_dump($re);
// $re = SelectSort::sort($arr);
$re = SelectSort::anOtherSort($arr);
var_dump($re);

// function findMinIndex($arr){
//     for ($i = 0; $i < count($arr); $i ++) {
//         $minIndex = $i;
//         for ($j = $i; $j < count($arr); $j ++) {
//             if ($arr[$j] < $arr[$minIndex]) {
//                 $minIndex = $j;
//             }    
//         }
//         $temp = $arr[$i];
//         $arr[$i] = $arr[$minIndex];
//         $arr[$minIndex] = $temp;
//     }
//     var_dump($arr);
// }

// // $arr = [2, 1, 0, 3, 4];
// findMinIndex($arr);