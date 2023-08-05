<?php

class BinarySearch
{
    public function search($arr, $target)
    {
        // 非递归实现二分查找法
        $l = 0;
        $r = count($arr) - 1;

        // 在 data[l,...,r] 范围内查找
        while ($l <= $r) {
            $mid = floor(($l + $r) / 2);
            if ($target == $arr[$mid]) {
                return $mid;
            }
            if ($target < $arr[$mid]) {
                $r = $mid - 1;
            } else {
                $l = $mid + 1;
            }
        }
        return -1;
    }

    public static function Main()
    {
        $arr = [1, 2, 3, 4, 5];
        $re = (new BinarySearch())->search($arr, 3);
        echo $re;
    }
}

BinarySearch::Main();
