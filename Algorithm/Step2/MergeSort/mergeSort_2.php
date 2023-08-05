<?php

class MergeSort
{
    protected $arr;
    public function sort($arr)
    {
        $this->arr = $arr;
        $this->implementSort(0, count($arr) - 1, 0);
        return $this->arr;
    }

    protected function implementSort($l, $r, $depth)
    {
        $depthString = $this->generateDepthString($depth);
        echo $depthString;
        echo sprintf("mergesort arr[%d, %d]", $l, $r).PHP_EOL;

        if ($l >= $r) {
            return;
        }
        $mid = floor(($l + $r)/2);
        $this->implementSort($l, $mid, $depth + 1);
        $this->implementSort($mid+1, $r, $depth + 1);

        echo $depthString;
        echo sprintf("merge arr[%d, %d] and arr[%d, %d]", $l, $mid, $mid+1, $r).PHP_EOL;

        $this->merge($l, $mid, $r, $depth);

        echo $depthString;
        echo sprintf("after mergesort arr[%d, %d] ", $l, $r). "：";
        for ($i = 0; $i < count($this->arr); $i++) {
            echo $this->arr[$i]." ";
        }
        echo PHP_EOL;
    }

    protected function merge($l, $mid, $r, $depth)
    {
        $temp = $this->copyOfRange($l, $r + 1);
        $depthString = $this->generateDepthString($depth);
        echo $depthString;
        $tempStr = '';
        for ($i = 0; $i < count($temp); $i++) {
            $tempStr .= $temp[$i]." ";
        }
        echo "temp: {$tempStr}".PHP_EOL;
        $i = $l;
        $j = $mid + 1;
        for ($k = $l; $k <= $r; $k++) {
            if ($i > $mid) {
                $this->arr[$k] = $temp[$j - $l];
                $j ++;
            } elseif ($j > $r) {
                $this->arr[$k] = $temp[$i - $l];
                $i ++;
            } elseif ($temp[$i - $l] <= $temp[$j - $l]) {
                $this->arr[$k] = $temp[$i - $l];
                $i ++;
            } else {
                $this->arr[$k] = $temp[$j - $l];
                $j ++;
            }
        }
    }

    protected function generateDepthString($depth)
    {
        $str = '';
        for ($i = 0; $i < $depth; $i ++) {
            $str .= '--'; 
        }
        return $str;
    }

    protected function copyOfRange($l, $r)
    {
        $temp = [];
        for ($i = $l; $i < $r; $i++) {
            $temp[] = $this->arr[$i];
        }
        return $temp;
    }
}

$arr = [7, 1, 4, 2, 8, 3, 6, 5];
$m = new MergeSort();
$re = $m->sort($arr);
var_dump($re);

//  function copyOfRange($arr, $l, $r)
//     {
//         $temp = [];
//         for ($i = $l; $i < $r; $i++) {
//             $temp[] = $arr[$i];
//         }
//         return $temp;
//     }

// $temp = copyOfRange($arr, 1, 3);
// var_dump($temp);