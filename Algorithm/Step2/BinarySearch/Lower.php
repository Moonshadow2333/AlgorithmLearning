<?php

class BS
{
    public function lower($arr, $target)
    {
        // 比 target 小的最大值
        // 在 arr[l, r] 中找
        $l = -1;
        $r = count($arr) - 1;
        $i = 0;
        echo '调用 lower 方法：'.PHP_EOL;
        while ($l < $r) {
            $mid = ceil(($l + $r) / 2);
            echo sprintf("第 %d 轮循环，初始搜索范围[%d, %d], mid = %d, arr[mid] = %d, ", $i, 
            $l, $r, $mid, $arr[$mid]);
            if ($target <= $arr[$mid]) {
                // 比 target 大的元素直接舍弃
                $r = $mid - 1;
            } else {
                $l = $mid;
            }
            echo sprintf("下轮循环的搜索范围[%d, %d] ", $l, $r).PHP_EOL;
            $i ++;
        }
        return $l;
    }

    public function lowerFloor($arr, $target)
    {
        echo '调用 lowerFloor 方法：'.PHP_EOL;

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
        $i = 0;
        echo '调用 upperFloor 方法：'.PHP_EOL;
        while ($l < $r) {
            $mid = ceil(($l + $r) / 2);
            echo sprintf("第 %d 轮循环，初始搜索范围[%d, %d], mid = %d, arr[mid] = %d, ", $i, 
            $l, $r, $mid, $arr[$mid]);
            if ($target < $arr[$mid]) {
                // 比 target 大的元素直接舍弃
                $r = $mid - 1;
            } else {
                $l = $mid;
            }
            echo sprintf("下轮循环的搜索范围[%d, %d] ", $l, $r).PHP_EOL;
            $i ++;
        }
        return $l;
    }

    public function myLower($arr, $target)
    {
        // 不带调试代码的 lower 方法
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

    public function MyLowerFloor($arr, $target)
    {
        // 不带调试代码的 MyLowerFloor 方法
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
    
    public function MyUpperFloor($arr, $target)
    {
        // 不带调试代码的 MyUpperFloor 方法
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

    public static function Main()
    {
        $arr = [1, 1, 3, 3, 5, 5, 7, 7];
        $bs = new BS();
        $arrStr = '['.implode(', ', $arr).']';
        $target = 3;
        $index = $bs->lower($arr, $target);
        echo sprintf("在数组 %s 中比 %d 大的最小值对应的索引是 %d，其值为：%d。", $arrStr, $target, $index, $arr[$index]).PHP_EOL;
        echo PHP_EOL;

        $index = $bs->lowerFloor($arr, $target);
        echo sprintf("在数组 %s 中比 %d 大的最小值对应的最小索引是 %d，其值为：%d。", $arrStr, $target, $index, $arr[$index]).PHP_EOL;
        echo PHP_EOL;

        $index = $bs->upperFloor($arr, $target);
        echo sprintf("在数组 %s 中比 %d 大的最小值对应的最大索引是 %d，其值为：%d。", $arrStr, $target, $index, $arr[$index]).PHP_EOL;
        echo PHP_EOL;
    }
}

BS::Main();
