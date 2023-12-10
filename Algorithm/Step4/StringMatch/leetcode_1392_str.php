<?php

class LongestPreFix {
    public function solve ($s) {
        // s[0,...,len - 1] ~ s[s.length - len,...,s.length - 1]
        for ($len = strlen($s) - 1; $len >= 1; $len --) {
            if ($this->isEqual($s, 0, $len, strlen($s) - $len, strlen($s) - 1)) {
                return substr($s, 0, $len);
            }
        }
        return "";
    }

    protected function isEqual ($s, $l1, $r1, $l2, $r2) {
        for ($i = $l1, $j = $l2; $i <= $r1 && $j <= $r2; $i++, $j++) {
            if ($s[$i] != $s[$j]) {
                return false;
            }
        }
        return true;
    }

    public static function Main () {
        $obj = new LongestPreFix();
        $s = 'level';
        $res = $obj->solve($s);
        var_dump($res);
    }
}

LongestPreFix::Main();
