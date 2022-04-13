<?php
include('../创建二叉树.php');
class Tree{
	public $nodes = [];
	public $stack = [];
	public function postOrderTraversal(Node $root){
		$cur  = $root;
		$prev = NULL;
		while($cur != NULL || !empty($this->stack)){
			while($cur != NULL){
				array_push($this->stack,$cur);
				$cur = $cur->left;
			}
			$cur = $this->stackPeek($this->stack);
			if($cur->right != NULL && $cur->right != $prev){
				$cur = $cur->right;
			}else{
				array_pop($this->stack);
				$this->nodes[] = $cur->data;
				$prev = $cur;
				$cur  = NULL; 
			}
		}
		return $this->nodes;
	}
	public function stackPeek($stack){
		return $stack[count($stack)-1];
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