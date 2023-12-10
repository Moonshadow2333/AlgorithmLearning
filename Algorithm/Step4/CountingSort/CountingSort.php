<?php

class CountingSort
{
    public function sort($nums)
    {
        $cnt = array_fill(0, 3, 0);

        foreach ($nums as $num) {
            $cnt[$num] += 1;
        }

        for ($i = 0; $i < $cnt[0]; $i ++) {
            $nums[$i] = 0;
        }

        for ($i = $cnt[0]; $i < $cnt[0] + $cnt[1]; $i++) {
            $nums[$i] = 1;
        }

        for ($i = $cnt[0] + $cnt[1]; $i < $cnt[0] + $cnt[1] + $cnt[2]; $i++) {
            $nums[$i] = 2; 
        }
        var_dump($nums);
    }

    public function moreBasicSort($nums)
    {
        // 处理元素取值范围为 [0, R) 的计数排序
        $r = 3;
        $cnt = array_fill(0, $r, 0);
        foreach ($nums as $num) {
            $cnt[$num] += 1;
        }
        // [index[$i], index[$i + 1]) 的值为 $i
        $index = array_fill(0, $r + 1, 0);
        for ($i = 0; $i < $r; $i++) {
            $index[$i + 1] = $index[$i] + $cnt[$i];
        }

        for ($i = 0; $i + 1 < count($index); $i ++) {
            // [index[$i], index[$i + 1]) 的值为 i
            for ($j = $index[$i]; $j < $index[$i + 1]; $j ++) {
                $nums[$j] = $i;
            }
        }
        var_dump($nums);
    }
}

$a = new CountingSort();
$nums = [1, 0, 2, 2, 1];
// $a->sort($nums);
$a->moreBasicSort($nums);