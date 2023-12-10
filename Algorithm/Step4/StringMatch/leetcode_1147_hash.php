<?php

class LongestDeComposition {
    protected $MOD = 10^9 + 7;
    protected $pow26 = [];
    public function longestDeComposition ($text) {
        $this->pow26[0] = 1;
        for ($i = 1; $i < strlen($text); $i ++) {
            $this->pow26[$i] = $this->pow26[$i - 1] * 26 % $this->MOD;
        }
        return $this->solve($text, 0, strlen($text) - 1);
    }
    // s[left, right]
    public function solve ($s, $left, $right) {
        if ($left > $right) {
            return 0;
        }

        $preHash = $postHash = 0;
        for ($i = $left, $j = $right; $i < $j; $i ++, $j --) {
            // s[left, i] == s[j, right]
            $preHash = ($preHash * 26 + ord($s[$i])) % $this->MOD;
            $postHash = (ord($s[$j]) * $this->pow26[$right - $j] + $postHash) % $this->MOD;
            if ($preHash == $postHash && $this->isEqual($s, $left, $i, $j, $right)) {
                return 2 + $this->solve($s, $i + 1, $j - 1);
            }
        }

        return 1;
    }

    // s[l1, r1] == s[l2, r2]; ?
    protected function isEqual ($s, $l1, $r1, $l2, $r2) {
        for ($i = $l1, $j = $l2; $i <= $r1 && $j <= $r2; $i++, $j++) {
            if ($s[$i] != $s[$j]) {
                return false;
            }
        }
        return true;
    }
}