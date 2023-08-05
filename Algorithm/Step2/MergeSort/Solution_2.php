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
        $this->implementSort($nums, 0, count($nums) - 1);
        return $this->count;
    }
    protected function implementSort(&$arr, $l, $r)
    {
        if ($l >= $r) {
            return;
        }
        $mid = floor(($l + $r)/2);
        $this->implementSort($arr, $l, $mid);
        $this->implementSort($arr, $mid+1, $r);
        $this->merge($arr, $l, $mid, $r);
    }

    protected function merge(&$arr, $l, $mid, $r)
    {
        $temp = $this->copyOfRange($arr, $l, $r + 1);
        $i = $l;
        $j = $mid + 1;
        for ($k = $l; $k <= $r; $k++) {
            if ($i > $mid) {
                $arr[$k] = $temp[$j - $l];
                $j ++;
            } elseif ($j > $r) {
                $arr[$k] = $temp[$i - $l];
                $i ++;
            } elseif ($temp[$i - $l] <= $temp[$j - $l]) {
                $arr[$k] = $temp[$i - $l];
                $i ++;
            } else {
                $this->count += $mid - $i + 1;
                $arr[$k] = $temp[$j - $l];
                $j ++;
            }
        }
    }

    protected function copyOfRange($arr, $l, $r)
    {
        $temp = [];
        for ($i = $l; $i < $r; $i++) {
            $temp[] = $arr[$i];
        }
        return $temp;
    }
}

$nums = [7,5,6,4];
$s = new Solution();
$count = $s->reversePairs($nums);
echo $count;
