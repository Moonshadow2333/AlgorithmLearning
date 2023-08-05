<?php

namespace Algorithm\DynamicArray;

class Stack_1441
{
    public function buildArray($target, $n) {
        $list = [];
        $ret = [];
        for ($i = 1; $i <= $n; $i++) {
            $list[] = $i;
        }

        $targetI = 0;
        for ($i = 0; $i < count($target); $i ++) {
            for ($j = $targetI; $j < $n && $list[$j] < $target[$i]; $j ++) {
                array_push($ret, "push");
                array_push($ret, "pop");
            }
            array_push($ret, "push");
            $targetI = $target[$i];   
        }
        return $ret;
    }
}