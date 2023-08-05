<?php

class SelectK
{
    public function selectKLoop(&$arr, $k)
    {
        // 把原数组进行排序后，第 k - 1 索引位置的元素的是谁（默认索引从0开始）。
        return $this->search($arr, 0, count($arr) - 1, $k - 1);
    }

    public function search(&$arr, $l, $r, $target)
    {
        // 在 data[l,...,r] 中找第 k - 1 个元素
        while ($l <= $r) {
            $p = mt_rand($l, $r);
            $this->swap($arr, $l, $p);
            $i = $l + 1;
            $j = $r;
            // arr[l+1,...,i - 1] < v; arr[j + 1,...,r] > v
            while (true) {
                while ($i <= $j && $arr[$i] < $arr[$l]) {
                    // 从前往后找 遇到第一个比 arr[l] 大的元素就停下
                    $i ++;
                }
                while ($j >= $i && $arr[$j] > $arr[$l]) {
                    // 从后往前找 遇到第一个比 arr[l] 小的元素就停下
                    $j --;
                }
                if ($i >= $j) {
                    break;
                }
                $this->swap($arr, $i, $j);
                $i ++;
                $j --;
            }
            $this->swap($arr, $l, $j);
            if ($target == $j) {
                return $arr[$j];
            } elseif ($target < $j) {
                $r = $j - 1;
            } else {
                $l = $j + 1;
            }
        }
    }

    public function swap(&$arr, $i, $j)
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }

    public static function Main()
    {
        $arr = [2,3,12,2,1,23];
        $re = (new SelectK())->selectKLoop($arr, 2);
        echo $re;
    }
}

SelectK::Main();
