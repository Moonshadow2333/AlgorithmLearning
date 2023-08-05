<?php

class BinarySearch
{
    public function search($arr, $target)
    {
        return $this->bs($arr, 0, count($arr) - 1, $target);
    }

    protected function bs($arr, $l, $r, $target)
    {
        if ($l > $r) {
            return -1;
        }
        $p = floor(($l + $r) / 2);
        if ($target < $arr[$p]) {
            return $this->bs($arr, $l, $p - 1, $target);
        } elseif ($target > $arr[$p]) {
            return $this->bs($arr, $p + 1, $r, $target);
        } else {
            return $p;
        }
    }

    public function upper($arr, $target)
    {
        $l = 0;
        $r = count($arr);
        while ($l < $r) {
            // 注意 l 不能等于 r，l = r 时是循环终止的条件
            $mid = floor(($l + $r) / 2);
            if ($target >= $arr[$mid]) {
                $l = $mid + 1;
            } else {
                $r = $mid;
            }
        }
        return $l;
    }

    public function upperCeil($arr, $target)
    {
        // 如果数组中存在元素，返回最大索引，如果数组中不存在元素，返回upper。
        $u = $this->upper($arr, $target);
        if ($u - 1 >= 0 && $arr[$u - 1] == $target) {
            return $u - 1;
        }
        return $u;
    }

    public function lowerCeil($arr, $target)
    {
        // 如果数组中存在元素，返回最小索引，如果数组中不存在元素，返回upper。
        $u = $this->upper($arr, $target);
        while ($u - 1 >= 0 && $arr[$u - 1] == $target) {
            $u --;
        }
        return $u;
    }

    public static function Main()
    {
        $arr = [1, 1, 3, 3, 5, 5];
        // $re = (new BinarySearch())->search($arr, 5);
        for ($i = 0; $i < count($arr); $i ++) {
            $res = (new BinarySearch())->lowerCeil($arr, $i);
            echo $res." ";
        }
    }
}

BinarySearch::Main();
