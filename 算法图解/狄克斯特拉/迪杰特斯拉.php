<?php

function Dj($graph, $costs, $parent)
{
    $node = find_lowest_cost_node($costs);
    $processed = [];
    while (!is_null($node)) {
        // 1. 获取起点到当前节点的开销
        $cost = $costs[$node];
        // 2. 获取当前节点的所有邻居。
        $neighbors = $graph[$node];
        // 3. 遍历当前节点的所有邻居节点。
        foreach ($neighbors as $childNode => $childCost) {
            //4. 计算从起点到当前节点的子节点的花销。
            $new_childNode_cost = $cost + $childCost;
            //5. 判断
            if ($costs[$childNode]>$new_childNode_cost) {
                // 6. 更新节点开销
                $costs[$childNode] = $new_childNode_cost;
                // 7. 更新父节点。
                $parent[$childNode] = $node;
            }
        }
        $processed[] = $node;
        $node = find_lowest_cost_node($costs, $processed);
    }
    $result = [
        'fin_cost' => $costs['fin'],
        'route' => $parent
    ];
    return $result;
}
function find_lowest_cost_node($costs, $processed = [])
{
    $lowest_cost_node = null;
    $lowest_cost = 1000;
    foreach ($costs as $node => $cost) {
        if (!in_array($node, $processed)  && $cost < $lowest_cost) {
            $lowest_cost = $cost;
            $lowest_cost_node = $node;
        }
    }
    return $lowest_cost_node;
}
function route($parent){
    $fatherNode = 'start';
    $route = [$fatherNode];
    for($i=0;$i<count($parent);$i++){
        foreach($parent as $k => $v){
            if($v === $fatherNode){
                $fatherNode = $k;
                $route[] = $k;
            }
        }
    }
    return showRoute($route);
}
function showRoute(array $route){
    $a = '';
    foreach ($route as $v) {
        $a .= $v.'-->';
    }
    $pos = strripos($a,'-->');
    $a = substr($a, 0, $pos);
    return $a;
}
$graph = [
    'start' => [
        'a' => 6,
        'b' => 3
    ],
    'a' => ['fin'=>1],
    'b' => [
        'a' => 3,
        'fin' => 5
    ],
    'fin' => []
];
$costs = [
    'a' => 6,
    'b' => 2,
    'fin' => 1000
];
$parent = [
    'a' => 'start',
    'b' => 'start',
    'fin' => null
];
$re = Dj($graph, $costs, $parent);
// var_dump($re);

$route = route($re['route']);
echo 'the shortest is '.$route."\n";

