<?php

class ThreeWaysQuickSort
{
    public function sort(&$arr)
    {
        $this->threeWaysSort($arr, 0, count($arr) - 1);
    }

    protected function threeWaysSort(&$arr, $l, $r)
    {
        if ($l >= $r) {
            return;
        }
        $result = $this->partition($arr, $l, $r);
        $lt = $result['lt'];
        $gt = $result['gt'];
        $this->threeWaysSort($arr, $l, $lt);
        $this->threeWaysSort($arr, $gt, $r);
    }

    protected function partition(&$arr, $l, $r)
    {
        $k = mt_rand($l, $r);
        $this->swap($arr, $l, $k);
        // 定义循环不变量 arr[l,...,lt] < v; arr[lt + 1,...,gt - 1] = v; arr[gt,...,r] > v
        // 定义 lt、gt、i
        // lt 最后一个小于 v 的元素所在的位置；
        // gt 第一个大于 v 的元素所在的位置。
        $lt = $l;
        $gt = $r + 1;
        $i = $l + 1;
        $v = $arr[$l];
        while ($i < $gt) {
            if ($arr[$i] < $v) {
                $lt ++;
                $this->swap($arr, $i, $lt);
                $i++;
            } elseif ($arr[$i] > $v) {
                $gt --;
                $this->swap($arr, $i, $gt);
            } else {
                $i ++;
            }
        }
        // 循环结束后，因为需要将 arr[l] 与 arr[lt] 进行交换，故最终 arr[l,...,lt - 1] < v; arr[lt,...,gt - 1] = v; arr[gt,...,r] > v
        $this->swap($arr, $l, $lt);

        return [
            'lt' => $lt - 1,
            'gt' => $gt
        ];
    }

    protected function swap(&$arr, $i, $j)
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }

    public static function Main()
    {
        $arr = [1,3,5,7,2,5,4,6,8];
        (new ThreeWaysQuickSort())->sort($arr);
        $result = '['.implode(', ', $arr).']';
        echo $result;
    }
}

ThreeWaysQuickSort::Main();
