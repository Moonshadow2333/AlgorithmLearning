<?php
function Dj(array $graph,array $costs, $parents)
{
    // 找出最小开销的节点。
    $node = find_lowest_cost_node($costs);
    echo $node.'|';
    $processed = [];
    while(!is_null($node)){
        $neighbors = $graph[$node];
        foreach($neighbors as $k => $v){
            $new_cost = $costs[$node] + $neighbors[$k];
            if($costs[$k]>$new_cost){
                $costs[$k] = $new_cost;
                $parents[$k] = $node;
            }
        }
        $processed[] = $node;
        $node = find_lowest_cost_node($costs,$processed);
    }
    return $parents;
}
function find_lowest_cost_node($costs,$processed=[]){
    $lowest_cost = 1000;
    $lowest_cost__node = null;
    foreach($costs as $node => $v){
        $cost = $costs[$node];
        if($cost < $lowest_cost && !in_array($node,$processed)){
            $lowest_cost = $cost;
            $lowest_cost__node = $node;
        }
    }
    return $lowest_cost__node;
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
$re = Dj($graph,$costs,$parents);

var_dump($re);