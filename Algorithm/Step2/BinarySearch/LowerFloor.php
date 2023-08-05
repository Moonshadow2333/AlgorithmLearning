<?php

class BinarySearch
{
    public function lowerFloor($arr, $target)
    {
        /*
            如果数组中存在target，则返回最小索引
            如果数组中不存在 target，返回 lower
        */
        $lower = $this->lower($arr, $target);
        if ($lower + 1 < count($arr) && $arr[$lower + 1] == $target) {
            return $lower + 1;
        }
        return $lower;
    }

    public function upperFloor($arr, $target)
    {
        /*
            如果数组中存在 target，返回最大索引；
            如果数组中不存在 target，返回 lower。
        */ 
        $l = -1;
        $r = count($arr) - 1;
        while ($l < $r) {
            $mid = ceil(($l + $r) / 2);
            if ($target < $arr[$mid]) {
                // 比 target 大的元素直接舍弃
                $r = $mid - 1;
            } else {
                $l = $mid;
            }
        }
        return $l;
    }

    public function lower($arr, $target)
    {
        // 比 target 小的最大值
        // 在 arr[l, r] 中找
        $l = -1;
        $r = count($arr) - 1;
        while ($l < $r) {
            $mid = ceil(($l + $r) / 2);
            if ($target <= $arr[$mid]) {
                // 比 target 大的元素直接舍弃
                $r = $mid - 1;
            } else {
                $l = $mid;
            }
        }
        return $l;
    }

    public static function Main()
    {
        $arr = [1, 1, 3, 3, 5, 5, 7, 7];
        $bs = new BinarySearch();

        for ($i = 0; $i < count($arr); $i ++) {
            $res = $bs->lowerFloor($arr, $i);
            echo $res." ";
        }
    }
}

BinarySearch::Main();