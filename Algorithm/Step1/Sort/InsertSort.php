<?php

class InsertSort
{
    private function __construct()
    {
    }

    public static function sort(array $arr)
    {
        // arr[0...i)已经排好序，arr[i...n)未排序
        // 把 arr[i] 放到合适的位置
        for ($i = 1; $i < count($arr); $i++) {
            $m = $i;
            $curr = $arr[$i];
            for ($j = $i; $j > 0; $j--) {
                if ($curr < $arr[$j - 1]) {
                    $t = $arr[$m];
                    $arr[$m] = $arr[$j-1];
                    $arr[$j - 1] = $t;
                    $m--;
                }
            }
        }
        return $arr;
    }
    public static function anotherSort(array $arr)
    {
        for ($i = 0; $i < count($arr); $i++) {
            $t = $arr[$i];
            for ($j = $i; $j - 1 >= 0 && $t < $arr[$j - 1]; $j--) {
                $arr[$j] = $arr[$j - 1];
            }
            $arr[$j] = $t;
        }
        return $arr;
    }
    public static function thirdSort(array $arr)
    {
        for ($i = count($arr) - 1; $i >= 0; $i--) {
            // 循环不变量：arr[0...i)未排序，arr[i...n)已排序
            for ($j = $i; $j + 1<count($arr);$j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $t = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $t;
                } else {
                    break;
                }
            }
        }
        return $arr;
    }
    public static function fourthSort(array $arr)
    {
        for ($i = count($arr) - 1; $i >= 0; $i--) {
            // 循环不变量：arr[0...i)未排序，arr[i...n)已排序
            $t = $arr[$i];
            for ($j = $i; $j + 1<count($arr) && $t > $arr[$j + 1]; $j++) {
                $arr[$j] = $arr[$j + 1];
            }
            var_dump($j);
            $arr[$j] = $t;
        }
        return $arr;
    }
}

// $arr = [1,4,3,2,6,5];
// var_dump(InsertSort::sort($arr));
// var_dump(InsertSort::anotherSort($arr));
// exit;
// var_dump(InsertSort::fourthSort($arr));

// for ($i = 0; $i + 1<count($arr); $i++) {
//     $arr[$i] = $arr[$i + 1];
// }
// var_dump($arr);

$arr = [1, 3, 4, 2];
$t = $arr[count($arr) - 1];
for ($j = count($arr) - 1; $j - 1 >= 0 && $t < $arr[$j - 1];  $j--) {
    $arr[$j] = $arr[$j - 1];
}
$arr[$j] = $t;
var_dump($j - 1);
// var_dump($j - 1);
var_dump($arr);
