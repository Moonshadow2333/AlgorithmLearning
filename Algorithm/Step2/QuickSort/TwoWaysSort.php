<?php

class TwoWaysQuickSort
{
    public function sort(&$arr)
    {
        $this->twoWaysSort($arr, 0, count($arr) - 1);
    }

    protected function twoWaysSort(&$arr, $l, $r)
    {
        if ($l >= $r) {
            return;
        }
        $p = $this->partition($arr, $l, $r);
        $this->twoWaysSort($arr, $l, $p - 1);
        $this->twoWaysSort($arr, $p + 1, $r);
    }

    protected function partition(&$arr, $l, $r)
    {
        // 随机化，避免因有序数组出现性能退化的问题
        //在区间[l, r]中取一个数k，交换arr[l]和arr[k]
        $k = mt_rand($l, $r);
        $this->swap($arr, $l, $k);
        // arr[l+1,...,i - 1] < v; arr[j + 1,...,r] > v
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
                // 循环终止条件，但 i 和 j 相等时，循环终止。
                break;
            }
            $this->swap($arr, $i, $j);
            $i ++;
            $j --;
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
        (new TwoWaysQuickSort())->sort($arr);
        $result = '['.implode(', ', $arr).']';
        echo $result;
    }
}

TwoWaysQuickSort::Main();
