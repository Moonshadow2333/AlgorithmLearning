<?php

function f($citys_needed, $map)
{
    if (empty($citys_needed)) {
        return [];
    }
    $best_broadcast = null;
    $citys_covered = [];
    foreach ($map as $broadcast=>$broadcast_cover_citys) {
        $citys_covered_by_broadcast = array_intersect($citys_needed, $broadcast_cover_citys);
        if (count($citys_covered_by_broadcast)>count($citys_covered)) {
            $citys_covered = $citys_covered_by_broadcast;
            $best_broadcast = $broadcast;
        }
    }
    $citys_needed = array_diff($citys_needed, $citys_covered);
    // var_dump($best_broadcast);
    // var_dump($citys_needed);
    return array_merge([$best_broadcast], f($citys_needed, $map));
}

$map = [
    'k1' => ['北京','上海','天津','江西','云南'],
    'k2' => ['北京','广州','深圳'],
    'k3' => ['上海','成都','杭州','北京'],
    'k4' => ['上海','天津'],
    'k5' => ['杭州','大连'],
];
$citys_needed = ['北京','上海','天津','广州','深圳','成都','杭州','大连'];
$re = f($citys_needed, $map);
var_dump($re);
// 1.
