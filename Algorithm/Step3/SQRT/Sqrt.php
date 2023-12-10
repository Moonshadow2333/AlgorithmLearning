<?php

namespace Algorithm\SQRT;

class Sqrt
{
    private $data;
    private $block;
    private $N;   // 元素总数
    private $B;   // 每组元素个数
    private $Bn;  // 组数

    public function __construct(array $nums)
    {
        $this->N = count($nums);
        if ($this->N == 0) {
            return ;
        }
        $this->B = (int)sqrt($this->N);
        $this->Bn = floor($this->N / $this->B) + ($this->N % $this->B > 0 ? 1 : 0);
        $this->data = $nums;
        for ($i = 0; $i < $this->N; $i ++) {
            $this->block[floor($i / $this->B)] += $nums[$i]; 
        }
    }

    public function sumRange($x, $y)
    {
        if ($x < 0 || $x >= $this->N || $y < 0 || $y >= $this->N || $x > $y) {
            return 0;
        }
        $bStart = floor($x / $this->B);
        $bEnd   = floor($y / $this->B);
        $ret = 0;
        if ($bStart == $bEnd) {
            // 同一组内
            for ($i = $x; $i <= $y; $i ++) {
                $ret += $this->data[$i];
            }
            return $ret;
        }

        for ($i = $x; $i < ($bStart + 1) * $this->B; $i ++) {
            $ret += $this->data[$i];
        }
        for ($b = $bStart + 1; $b < $bEnd; $b ++) {
            $ret += $this->block[$b]; 
        }
        for ($i = $bEnd * $this->B; $i <= $y; $i ++) {
            $ret += $this->data[$i];
        }
        return $ret;
    }

    public function update($i, $val)
    {
        if ($i < 0 || $i >= $this->N) {
            return;
        }
        $b = floor($i / $this->B);
        $this->block[$b] -= $this->data[$i];
        $this->block[$b] += $val; 

        $this->data[$i] = $val;
    }
}

$numArray = new Sqrt([1, 3, 5]);
echo $numArray->sumRange(0, 2).PHP_EOL; // 返回 1 + 3 + 5 = 9
echo $numArray->update(1, 2);   // nums = [1,2,5]
echo $numArray->sumRange(0, 2).PHP_EOL; // 返回 1 + 2 + 5 = 8