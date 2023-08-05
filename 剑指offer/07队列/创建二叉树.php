<?php

class Node{
	public $left = NULL;
	public $right = NULL;
	public $data = '';
	public function __construct($data){
		$this->data = $data;
	}
	public function buildTree(Node $lchild = NULL,Node $rchild = NULL){
		if(!is_null($lchild)){
			$this->left = $lchild;
		}
		if(!is_null($rchild)){
			$this->right = $rchild;
		}
	}
}

// $a = new Node('A');
// $b = new Node('B');
// $c = new Node('C');
// $d = new Node('D');
// $e = new Node('E');
// $f = new Node('F');
// $g = new Node('G');
// $h = new Node('H');
// $i = new Node('j');
// $a->buildTree($b,$c);
// $b->buildTree($d,$e);
// $c->buildTree($f,$g);
// $e->buildTree($h,$i);
