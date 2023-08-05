<?php

class Solution
{
    /**
    * @param Integer[] $nums
    * @return Integer
    */
    public $count = 0;
    public function reversePairs($nums)
    {
        $this->a($nums, 0, count($nums) - 1);
        return $this->count;
    }
    public function a($nums, $l, $r)
    {
        if ($l >= $r) {
            return;
        }
        $mid = floor(($l + $r) / 2);
        $this->a($nums, $l, $mid);
        $this->a($nums, $mid + 1, $r);
        $this->count($nums, $l, $mid, $r);
    }
    public function count($nums, $l, $mid, $r)
    {
        for ($i  = $l; $i  <= $mid; $i ++) {
            for ($j = $mid + 1; $j <= $r; $j++) {
                if ($nums[$i] > $nums[$j]) {
                    $this->count++;
                }
            }
        }
    }
}

$nums = [7,5,6,4];
$s = new Solution();
$count = $s->reversePairs($nums);
echo $count;
