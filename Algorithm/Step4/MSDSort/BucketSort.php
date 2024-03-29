<?php

class BucketSort {
    public function sort ($arr, $B) {
        echo $B.PHP_EOL;
        if ($B <= 1) {
            throw new Exception('B must be greater than 1');
        }
        $this->implementSort($arr, 0, count($arr) - 1, $B, []);
        return $arr;
    }

    protected function implementSort (&$arr, $left, $right, $B, $temp) {
        if ($left > $right) {
            return;
        }
        $maxVal = PHP_INT_MIN;
        $minVal = PHP_INT_MAX;

        for ($i = $left; $i <= $right; $i ++) {
            $maxVal = max($arr[$i], $maxVal);
            $minVal = min($arr[$i], $minVal);
        }

        if ($maxVal == $minVal) {
            return;
        }

        $cnt = array_fill(0, $B, 0);
        $index = array_fill(0, $B + 1, 0);
        $d = ceil(($maxVal - $minVal + 1) / $B);
        for ($i = $left; $i <= $right; $i ++) {
            $cnt[($arr[$i] - $minVal) / $d] += 1;
        }

        for ($j = 0; $j < $B ; $j ++) {
            $index[$j + 1] = $index[$j] + $cnt[$j];
        }

        for ($i = $left; $i <= $right; $i ++) {
            $p = ($arr[$i] - $minVal) / $d;
            $temp[$index[$p]] = $arr[$i];
            $index[$p] ++;
        }
        
        for ($k = $left; $k <= $right; $k ++) {
            $arr[$k] = $temp[$k - $left]; // 偏移量
        }

        // 排序第 0 号桶
        $this->implementSort($arr, $left, $left + $index[0] - 1, $B, $temp);
        for ($i = 0; $i < $B - 1; $i ++) {
            $this->implementsort($arr, $left + $index[$i], $left + $index[$i + 1] - 1, $B, $temp);
        }
    }

    public static function Main () {
        $obj = new BucketSort();
        $arr = [111, 11, 3, 4, 11, 23, 7];
        $re = $obj->sort($arr, 2);
        var_dump($re);
    }
}

BucketSort::Main();