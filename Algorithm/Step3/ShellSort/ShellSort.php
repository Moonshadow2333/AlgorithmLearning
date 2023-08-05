<?php

class ShellSort
{
    public function sort(&$arr)
    {
        $this->implementsSort3($arr);
    }

    public function implementsSort(&$arr)
    {
        $h = floor(count($arr) / 2);
        while ($h >= 1) {
            for ($start = 0; $start < $h; $start ++) {
                // 对 data[start, start + h, start + 3h, ...] 进行插入排序
                for ($i = $start + $h; $i < count($arr); $i += $h) {
                    $t = $arr[$i];
                    for ($j = $i; $j - $h >= 0 && $t < $arr[$j - $h]; $j -= $h) {
                        $arr[$j] = $arr[$j - $h];
                    }
                    $arr[$j] = $t;
                }
            }
            $h = floor($h / 2);
        }
    }

    public function implementsSort2(&$arr)
    {
        // 四重循环变成三重循环
        // 不需要将数组分为h个子数组后再进行插入排序
        // 单从代码可读性来讲，自然是 3 重循环更加易懂可读
        $h = floor(count($arr) / 2);
        while ($h >= 1) {

            // 对 data[h,n) 进行插入排序
            for ($i = $h; $i < count($arr); $i += $h) {
                $t = $arr[$i];
                for ($j = $i; $j - $h >= 0 && $t < $arr[$j - $h]; $j -= $h) {
                    $arr[$j] = $arr[$j - $h];
                }
                $arr[$j] = $t;
            }

            $h = floor($h / 2);
        }
    }

    public function implementsSort3(&$arr)
    {
        // 性能优化
        // 如果使用 1, 4, 13, 40这种步长序列完成希尔排序算法
        $h = 1;
        while ($h < count($arr)) {
            $h = 3 * $h + 1;
        }

        while ($h >= 1) {

            for ($i = $h; $i < count($arr); $i += $h) {
                $t = $arr[$i];
                for ($j = $i; $j - $h >= 0 && $t < $arr[$j - $h]; $j -= $h) {
                    $arr[$j] = $arr[$j - $h];
                }
                $arr[$j] = $t;
            }

            $h = floor($h / 3);
        }
    }

    public function insertSort(&$arr)
    {
        // 先尝试实现插入排序法
        // [0, i)有序，[i,n)无序
        for ($i = 0; $i < count($arr); $i++) {
            $t = $arr[$i];
            for ($j = $i; $j - 1 >= 0 && $t <= $arr[$j - 1]; $j --) {
                $arr[$j] = $arr[$j - 1];
            }
            $arr[$j] = $t;
        }
    }

    public static function main()
    {
        $arr = [3, 2, 8, 4, 6, 1, 5, 7];
        (new ShellSort())->sort($arr);
        var_dump($arr);
    }
}
ShellSort::main();
