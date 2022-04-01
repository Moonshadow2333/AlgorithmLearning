<?php
function binarySearch(array $list, $item)
{
    $low = 0;
    $high = count($list)-1;
    while ($low <= $high) {
        $mid = floor(($low + $high) / 2);
        $guess = $list[$mid];
        if ($guess == $item) {
            return $mid;
        }
        if ($guess > $item) {
            $high = $mid -1;
        } else {
            $low = $mid + 1;
        }
    }
    return '没有找到'.$item;
}
$list = [];
for ($i=0;$i<1000;$i++) {
    $list[] = rand(-1000, 1000);
}
sort($list);
$index = binarySearch($list, 999);
echo $index;
