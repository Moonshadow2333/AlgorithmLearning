<?php

class LSDSort
{
    public static function sort($arr, $w)
    {
        foreach ($arr as $v) {
            if (strlen($v) != $w) {
                throw new Exception("All string's length must be same.");
            }
        }

        for ($i = $w - 1; $i >= 0; $i --) {
            $r = 256;   // 0~255 255 + 1
            
            $cnt = array_fill(0, $r, 0);

            foreach ($arr as $s) {
                $ascii = self::letter2num($s[$i]);
                $cnt[$ascii] += 1;
            }

            $index = array_fill(0, $r, 0);
            for ($j = 0; $j < $r; $j ++) {
                $index[$j + 1] = $index[$j] + $cnt[$j];
            }

            $temp = array_fill(0, count($arr), 0);
            foreach ($arr as $s) {
                $ascii = self::letter2num($s[$i]);
                $temp[$index[$ascii]] = $s;
                $index[$ascii] ++;
            }
            
            for ($k = 0; $k < count($arr); $k ++) {
                $arr[$k] = $temp[$k];
            }
        }

        return $arr;
    }

    public static function  Main() {
        
        $arr = ['BCA', 'CAB', 'ACB', 'BAC', 'ABC', 'CBA'];
        $arr = LSDSort::sort($arr, 3);
        var_dump($arr);
    }

    public static function letter2num($letter)
    {
        return ord($letter);
    }
}
LSDSort::Main();
