<?php
class Solution
{
    public $vs = [0,2,4,3,7];
    public $ws = [0,2,3,5,5];

    public function testKnapsack1()
    {
        $result = $this->ks(4, 10);
        var_dump($result);
    }

    private function ks(int $i, int $c)
    {
        $result = 0;
        if ($i == 0 || $c == 0) {
            // 初始条件
            $result = 0;
        } elseif ($this->ws[$i] > $c) {
            // 装不下该珠宝
            $result = $this->ks($i-1, $c);
        } else {
            // 可以装下
            $tmp1 = $this->ks($i-1, $c);
            $tmp2 = $this->ks($i-1, $c-$this->ws[$i]) + $this->vs[$i];
            $result = max($tmp1, $tmp2);
        }
        return $result;
    }
}
$obj = new Solution();
$re = $obj->testKnapsack1();