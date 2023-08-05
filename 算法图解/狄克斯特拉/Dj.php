<?php
// $graph['start']['a'] = 6;
// $graph['start']['b'] = 2;
// $graph['a']['fin'] = 1;
// $graph['b']['a'] = 3;
// $graph['b']['fin'] = 5;
// $graph['fin'] = [];
// $infinity = 1000;
// $costs['a'] = 6;
// $costs['b'] = 2;
// $costs['fin'] = $infinity;
// $parents['a'] = 'start';
// $parents['b'] = 'start';
// $parents['fin'] = null;
function Dj($graph, $costs, $parents)
{
    $node = find_lowest_cost_node($costs);
    $processed = [];
    while (!is_null($node)) {
        $cost = $costs[$node];
        $neighbors = $graph[$node];
        foreach ($neighbors as $k => $v) {
            $new_cost = $cost + $neighbors[$k];
            if ($costs[$k]>$new_cost) {
                $costs[$k] = $new_cost;
                $parents[$k] = $node;
            }
        }
        $processed[] = $node;
        $node = find_lowest_cost_node($costs, $processed);
    }
    // return;
    $result = [
        'fin_cost' => $costs['fin'],
        'route' => $parents
    ];
    return $result;
}
function find_lowest_cost_node($costs, $processed=[])
{
    $lowest_cost = 1000;
    $lowest_cost_node = null;
    foreach ($costs as $node => $v) {
        $cost = $costs[$node];
        if ($cost < $lowest_cost and !in_array($node, $processed)) {
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
$graph['start']['A'] = 5;
$graph['start']['B'] = 2;
$graph['B']['A'] = 8;
$graph['B']['C'] = 7;
$graph['A']['D'] = 4;
$graph['A']['C'] = 2;
$graph['D']['C'] = 6;
$graph['D']['fin'] = 3;
$graph['C']['fin'] = 1;
$graph['fin'] = [];
$infinity = 1000;
$costs['A'] = 5;
$costs['B'] = 2;
$costs['C'] = $infinity;
$costs['D'] = $infinity;
$costs['fin'] = $infinity;
$parents['A'] = 'start';
$parents['B'] = 'start';
$parents['C'] = null;
$parents['D'] = null;
$parents['fin'] = null;
$re = Dj($graph, $costs, $parents);
$route = route($re['route']);
var_dump($re['route']);
exit;
echo $route;