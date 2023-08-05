<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        return $this->binarySearch($nums, 0, count($nums) - 1, $target);
    }

    protected function binarySearch($arr, $l, $r, $target)
    {
        if ($l > $r) {
            return -1;
        }
        $p = floor(($l + $r) / 2);
        if ($target < $arr[$p]) {
            return $this->binarySearch($arr, $l, $p - 1, $target);
        } elseif ($target > $arr[$p]) {
            return $this->binarySearch($arr, $p + 1, $r, $target);
        } else {
            return $p;
        }
    }

    public function search2($arr, $target)
    {
        // 定义循环不变量
        // arr[l, r) 的范围中寻找 target
        $l = 0;
        $r = count($arr);

        while ($l < $r) {
            $mid = floor(($l + $r) / 2);
            if ($target == $arr[$mid]) {
                return $mid;
            }
            if ($target < $arr[$mid]) {
                $r = $mid; // 继续在 data[l, mid) 范围里寻找
            } else {
                $l = $mid + 1; // 继续在 data[mid + 1, r) 范围里寻找
            }
        }
        return -1;
    }
}