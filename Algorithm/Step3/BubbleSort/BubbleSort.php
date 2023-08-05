<?php

class BubbleSort
{
    public function sort($arr)
    {
        for ($i = count($arr) - 1; $i >= 0; $i--) {
            for ($j = 0; $j < $i; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $this->swap($arr, $j, $j + 1);
                }
            }
        }
        return $arr;
    }

    public function sort2($arr)
    {
        for ($i = count($arr) - 1; $i >= 0; $i--) {
            $isSwaped = false;
            for ($j = 0; $j < $i; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $this->swap($arr, $j, $j + 1);
                    $isSwaped = true;
                }
            }
            if (!$isSwaped) {
                break;
            }
        }
        return $arr;
    }

    public function sort3(&$arr)
    {
        for ($i = 0; $i + 1 < count($arr);) {
            $lastSwapedIndex = 0; // 用于记录最后一次交换的索引

            for ($j = 0; $j < count($arr) - $i - 1; $j++) {
                // count($arr) - $i - 1 是为了避免 j 出界，因为后面需要比较 j 和 j++ 的大小
                if ($arr[$j] > $arr[$j + 1]) {
                    $this->swap($arr, $j, $j + 1);
                    $lastSwapedIndex = $j + 1;
                }
            }
            $i = count($arr) - $lastSwapedIndex;
            // echo $lastSwapedIndex.' - '.$i.PHP_EOL;
        }
    }

    public function swap(&$arr, $i, $j)
    {
        $t = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $t;
    }

    public static function main()
    {
        // $arr = range(1, 100000);
        $arr = [3, 1, 2, 4, 5, 6];
        $start = time();
        $res = (new BubbleSort())->sort3($arr);
        var_dump($arr);
        $end = time();
        // echo $end - $start;
    }
}


BubbleSort::main();