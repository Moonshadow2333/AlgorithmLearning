<?php

class Node{
	public $left  = NULL;
	public $right = NULL;
	public $data;
	public function __construct($data){
		$this->data = $data;
	}
	public function buildTree(Node $lchild, Node $rchild){
		if(!is_null($lchild)){
			$this->left = $lchild;
		}
		if(!is_null($rchild)){
			$this->right = $rchild;
		}
	}

}