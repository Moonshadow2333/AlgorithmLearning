<?php

class OneWayQuickSort
{
    public function sort(&$arr)
    {
        $this->oneWaySort($arr, 0, count($arr) - 1);
    }

    protected function oneWaySort(&$arr, $l, $r)
    {
        if ($l >= $r) {
            return;
        }
        $p = $this->partition($arr, $l, $r);
        $this->oneWaySort($arr, $l, $p - 1);
        $this->oneWaySort($arr, $p + 1, $r);
    }

    protected function partition(&$arr, $l, $r)
    {
        // 原地分割
        // arr[l+1,...,j] < v; arr[j+1,...,i-1] >= v
        $j = $l;
        for ($i = $l + 1; $i <= $r; $i++) {
            if ($arr[$i] < $arr[$l]) {
                $j ++;
                $this->swap($arr, $i, $j);
            }
        }
        $this->swap($arr, $l, $j);
        return $j;
    }

    protected function swap(&$arr, $i, $j)
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }

    public static function Main()
    {
        $arr = [1,3,5,7,2,4,6,8];
        (new OneWayQuickSort())->sort($arr);
        $result = '['.implode(', ', $arr).']';
        echo $result;
    }
}

OneWayQuickSort::Main();