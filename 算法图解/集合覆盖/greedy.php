<?php

function greedy(array $map, $citys_needed)
{
    $ArrayList = [];
    while ($citys_needed) {
        $best_station = null;
        $citys_covered = [];
        foreach ($map as $station=>$citys) {
            $covered = array_intersect($citys, $citys_needed);
            if (count($covered)>count($citys_covered)) {
                $best_station = $station;
                $citys_covered = $covered;
            }
        }
        $citys_needed = array_diff($citys_needed, $citys_covered);
        $ArrayList[] = $best_station;
    }
    return $ArrayList;
    // return $maxSet;
}
$map = [
    'k1' => ['北京','上海','天津'],
    'k2' => ['北京','广州','深圳'],
    'k3' => ['上海','成都','杭州'],
    'k4' => ['上海','天津'],
    'k5' => ['杭州','大连'],
];
$citys_needed = ['北京','上海','天津','广州','深圳','成都','杭州','大连'];
$re = greedy($map, $citys_needed);
// echo $re;
var_dump($re);
