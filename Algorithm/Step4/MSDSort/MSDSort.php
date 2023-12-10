<?php

class MSDSort {
    public function sort ($arr) {
        $this->implementsort($arr, 0, (count($arr) - 1), 0);
        return $arr;
    } 
    
    // 根据 r 位置的字符，处理 arr[left, right]
    protected function implementsort (&$arr, int $left, int $right, int $r) {
        if ($left >= $right) {
            return;
        }

        $R = 256;   // 0~255 255 + 1
        $cnt = array_fill(0, $R + 1, 0);
        $index = array_fill(0, $R + 2, 0);
        $temp = array_fill(0, $right - $left + 1, 0);

        for ($i = $left; $i <= $right; $i ++) {
            $ascii = $r >= strlen($arr[$i]) ? 0 : (self::letter2num($arr[$i][$r]) + 1); // TODO 这里为什么要加一？
            $cnt[$ascii] += 1;
        }

        for ($j = 0; $j < $R + 1 ; $j ++) {
            $index[$j + 1] = $index[$j] + $cnt[$j];
        }

        for ($i = $left; $i <= $right; $i ++) {
            $p = $r >= strlen($arr[$i]) ? 0 : (self::letter2num($arr[$i][$r]) + 1);
            $temp[$index[$p]] = $arr[$i];
            $index[$p] ++;
        }
        
        for ($k = $left; $k <= $right; $k ++) {
            $arr[$k] = $temp[$k - $left]; // 偏移量
        }
        // var_dump($arr);
        // return $arr;
        for ($i = 0; $i < $R; $i ++) {
            $this->implementsort($arr, $left + $index[$i], $left + $index[$i + 1] - 1, $r + 1);
        }
    }

    public static function letter2num($letter)
    {
        return ord($letter);
    }

    public static function Main () {
        $obj = new MSDSort();
        $arr = ['BCA', 'CBAA', 'AC', 'BADFE', 'ABC', 'CBA'];
        $re = $obj->sort($arr);
        var_dump($re);
    }
}

MSDSort::Main();