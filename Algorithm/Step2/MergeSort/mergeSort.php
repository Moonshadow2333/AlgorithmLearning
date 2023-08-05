<?php

class MergeSort
{
    public function sort(&$arr)
    {
        $this->implementSort($arr, 0, count($arr) - 1);
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

$arr = [7, 1, 4, 2, 8, 3, 6, 5];
$m = new MergeSort();
$m->sort($arr);
var_dump($arr);