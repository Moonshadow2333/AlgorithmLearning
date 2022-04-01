<?php
function binarySearch($list, $low, $high, $item)
{
    if ($low <= $high) {
        $mid = floor(($low + $high) / 2);
        $guess = $list[$mid];
        if ($guess == $item) {
            return $mid;
        }
        if ($guess < $item) {
            return binarySearch($list, $mid+1, $high, $item);
        } elseif ($guess > $item) {
            return binarySearch($list, $low, $mid-1, $item);
        }
    } else {
        return '没有找到'.$item;
    }
}
$list = [];
for ($i=0;$i<1000;$i++) {
    $list[] = rand(-1000, 1000);
}
sort($list);
$low = 0;
$high = count($list)-1;
$index = binarySearch($list, $low, $high, 300);
var_dump($index);
