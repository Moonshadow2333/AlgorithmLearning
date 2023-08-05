<?php

class Solution {

    /**
     * @param Integer[] $nums
     * 
     * @return Integer
     */
    function findKthLargest($nums, $k)
    {
        $k = count($nums) - $k + 1;
        return $this->sort($nums, 0, count($nums) - 1, $k);
    }

    public function sort(&$arr, $l, $r, $k)
    {
        // 1. 递归终止条件
        if ($l >= $r) {
            return $arr[$l];
        }
        // 2. 随机化，避免因有序数组出现性能退化的问题
        //在区间[l, r]中取一个数k，交换arr[l]和arr[k]
        $m = mt_rand($l, $r);
        $this->swamp($arr, $l, $m);
        $i = $l + 1;
        $j = $r;
        while (true) {
            while ($i <= $j && $arr[$i] < $arr[$l]) {
                $i ++;
            }
            while ($j >= $i && $arr[$j] > $arr[$l]) {
                $j --;
            }
            if ($i >= $j) {
                break;
            }
            $this->swamp($arr, $i, $j);
            $i ++;
            $j --;
        }
        $this->swamp($arr, $l, $j);
        if ($k - 1 == $j) {
            var_dump($arr);
            return $arr[$k - 1];
        } elseif ($k - 1 < $j) {
            return $this->sort($arr, $l, $j - 1, $k);
        } else {
            return $this->sort($arr, $j + 1, $r, $k);
        }
    }

    public function swamp(&$arr, $i, $j)
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }
}

$nums = [3,2,3,1,2,4,5,5,6];
$k = 4;

$nums = [3,2,1,5,6,4];
$k = 2;

// $nums = [-1, -1];
// $k = 2;

$so = new Solution();

$re = $so->findKthLargest($nums, $k);
var_dump($re);