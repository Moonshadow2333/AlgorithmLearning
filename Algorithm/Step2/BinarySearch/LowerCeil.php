<?php

class BS
{
    public function lowerCeil($arr, $target)
    {
        // 查找大于等于 target 的最小索引
        $l = 0;
        $r = count($arr);
        $i = 0;
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

    public static function Main()
    {
        $arr = [23, 36, 65, 69, 72, 72,89, 96, 99];
        $up = new BS();
        $arrStr = '['.implode(', ', $arr).']';

        $targets = [60, 72, 78, 99];
        for ($i = 0; $i < count($targets); $i ++) {
            $target = $targets[$i];
            $index = $up->lowerCeil($arr, $target);
            echo sprintf("在数组 %s 中比 %d 大的最小值对应的索引是 %d，其值为：%d。", $arrStr,$target, $index, $arr[$index]).PHP_EOL;
            echo PHP_EOL;
        }
    }
}

BS::Main();