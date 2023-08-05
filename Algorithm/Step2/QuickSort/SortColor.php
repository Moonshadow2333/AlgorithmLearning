<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @return NULL
     */
    public function sortColors(&$nums)
    {
        $this->sort($nums, 0, count($nums) - 1);
    }

    public function sort(&$arr, $l, $r)
    {
        // 1. 递归终止条件
        if ($l >= $r) {
            return;
        }
        // 2. 随机化，避免因有序数组出现性能退化的问题
        $k = mt_rand($l, $r);
        $this->swamp($arr, $l, $k);
        // arr[$l,...,$lt - 1] < $arr[l], arr[lt,...,gt-1] == arr[l], arr[gt,...,r] > arr[l]
        // lt 最后一个小于 $arr[$l] 的元素所在的位置；
        // gt 第一个大于 $arr[$l] 的元素所在的位置。
        $lt = $l;
        $i = $l + 1;
        $gt = $r + 1;
        while ($i < $gt)
        {
            if ($arr[$i] < $arr[$l]) {
                $lt ++;
                $this->swamp($arr, $i, $lt);
                $i ++;
            } elseif ($arr[$i] > $arr[$l]) {
                $gt --;
                $this->swamp($arr, $i, $gt);
            } else {
                $i ++;
            }
        }
        $this->swamp($arr, $l, $lt);
        $this->sort($arr, $l, $lt);
        $this->sort($arr, $gt, $r);
    }

    public function swamp(&$arr, $i, $j)
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;        
    }
}

$nums = [2,0,2,1,1,0];
$so = new Solution();
$so->sortColors($nums);
var_dump($nums);