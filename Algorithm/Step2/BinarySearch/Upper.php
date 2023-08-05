<?php

class BS
{
    // 二分查找法的变式
    public function upper($arr, $target)
    {
        $l = 0;
        $r = count($arr);
        $i = 1;
        echo '调用 upper 方法：'.PHP_EOL;
        while ($l < $r) {
            $mid = floor(($l + $r) / 2);
            echo sprintf("第 %d 轮循环，初始搜索范围[%d, %d], mid = %d, arr[mid] = %d, ", $i, $l, $r, $mid, $arr[$mid]);
            if ($target >= $arr[$mid]) {
                $l = $mid + 1;
            } else {
                $r = $mid;
            }
            echo sprintf("下轮循环的搜索范围[%d, %d] ", $l, $r).PHP_EOL;
            $i ++;
        }
        return $l;
    }

    public function upperCeil($arr, $target)
    {
        // 如果数组中存在元素，返回最大索引，如果数组中不存在元素，返回 upper。
        // 先找到比 target 的最小值对应的索引 u，如果 u-1 对应的元素等于 target，则返回 u - 1，否则返回 u。
        echo '调用 upperCeil 方法：'.PHP_EOL;
        $u = $this->upper($arr, $target);
        if ($u - 1 >= 0 && $arr[$u - 1] == $target) {
            return $u - 1;
        }
        return $u;
    }

    public function lowerCeil($arr, $target)
    {
        // 查找大于等于 target 的最小索引
        $l = 0;
        $r = count($arr);
        $i = 0;
        echo '调用 lowerCeil 方法：'.PHP_EOL;
        while ($l < $r) {
            $mid = floor(($l + $r) / 2);
            echo sprintf("第 %d 轮循环，初始搜索范围[%d, %d], mid = %d, arr[mid] = %d, ", $i, $l, $r, $mid, $arr[$mid]);
            if ($target > $arr[$mid]) {
                $l = $mid + 1;
            } else {
                $r = $mid;
            }
            echo sprintf("下轮循环的搜索范围[%d, %d] ", $l, $r).PHP_EOL;
            $i ++;
        }
        return $l;
    }

    public function myUpper($arr, $target)
    {
        // 不带调试代码的 upper 方法
        $l = 0;
        $r = count($arr);
        while ($l < $r) {
            $mid = floor(($l + $r) / 2);
            if ($target >= $arr[$mid]) {
                $l = $mid + 1;
            } else {
                $r = $mid;
            }
        }
        return $l;
    }

    public function myLowerCeil($arr, $target){
        // 不带调试代码的 lowerCeil 方法
        $l = 0;
        $r = count($arr);
        while ($l < $r) {
            $mid = floor(($l + $r) / 2);
            if ($target > $arr[$mid]) {
                // 与 upper 方法相比，不同之处在于这里没有等于号
                $l = $mid + 1;
            } else {
                $r = $mid;
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
        $index = $bs->upper($arr, $target);
        echo sprintf("在数组 %s 中比 %d 大的最小值对应的索引是 %d，其值为：%d。", $arrStr,$target, $index, $arr[$index]).PHP_EOL;

        echo PHP_EOL;

        $index = $bs->upperCeil($arr, $target);
        echo sprintf("在数组 %s 中比 %d 大的最小值对应的大索引是 %d，其值为：%d。", $arrStr,$target, $index, $arr[$index]).PHP_EOL;

        echo PHP_EOL;

        $index = $bs->lowerCeil($arr, $target);
        echo sprintf("在数组 %s 中比 %d 大的最小值对应的小索引是 %d，其值为：%d。", $arrStr,$target, $index, $arr[$index]).PHP_EOL;
    }
}

BS::Main();