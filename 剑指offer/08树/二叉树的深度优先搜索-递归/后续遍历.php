<?php
include('../创建二叉树.php');
class Tree{
	public $nodes = [];
	public function postOrderTraversal(Node $root){
		$this->dfs($root,$this->nodes);
		return $this->nodes;
	}
	public function dfs($root,$nodes){
		if($root != NULL){
			$this->dfs($root->left,$nodes);
			$this->dfs($root->right,$nodes);
			$this->nodes[] = $root->data;
		}
	}
}

$a = new Node(1);
$b = new Node(2);
$c = new Node(3);
$d = new Node(4);
$e = new Node(5);
$f = new Node(6);
$g = new Node(7);
$a->buildTree($b,$c);
$b->buildTree($d,$e);
$c->buildTree($f,$g);

$tree = new Tree();
$re = $tree->postOrderTraversal($a);
var_dump($re);