<?php

function traverseBinaryTree($node, $tree)
{
    $search_queue = $tree[$node];
    $result = [$node];
    while (!empty($search_queue)) {
        $node = array_shift($search_queue);
        array_push($result, $node);
        $neighbors = $tree[$node];
        $search_queue = array_merge($search_queue, $neighbors);
    }
    return $result;
}
$tree = [
    'A' => [
        'B',
        'C',
    ],
    'B' => [
        'E',
        'D'
    ],
    'C' => [
        'G',
        'F'
    ],
    'D' => ['M'],
    'E' => [],
    'F' => [],
    'G' => ['N'],
    'M' => [],
    'N' => [],
];

$re = traverseBinaryTree('A', $tree);
$str = '';
foreach ($re as $v) {
    $str .= $v.'-->';
}
$pos = strripos($str, '-->');
$str = substr($str, 0, $pos);
echo $str;
