<?php

include('../创建二叉树.php');
class Tree
{
    public $nodes = [];
    public $stack = [];
    public function inorderTraversal(Node $root)
    {
        $cur = $root;
        while ($cur != null || !empty($this->stack)) {
            while ($cur != null) {
                array_push($this->stack, $cur);
                $cur = $cur->left;
            }
            $cur = array_pop($this->stack);
            array_push($this->nodes, $cur->data);
            $cur = $cur->right;
        }
        return $this->nodes;
    }
}

$a = new Node(1);
$b = new Node(2);
$c = new Node(3);
$d = new Node(4);
$e = new Node(5);
$f = new Node(6);
$g = new Node(7);
$h = new Node(8);
$i = new Node(9);
$j = new Node(10);
$a->buildTree($b, $c);
$b->buildTree($d, $e);
$c->buildTree($f, $g);
$e->buildTree($h, $i);
$g->left = $j;
$tree = new Tree();
$re = $tree->inorderTraversal($a);
var_dump($re);
