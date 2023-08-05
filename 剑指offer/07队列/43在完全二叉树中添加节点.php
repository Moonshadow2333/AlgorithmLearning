<?php
include './创建二叉树.php';
class GBTInserter{
	private $queue = [];
	private $root;
	public function __construct($root){
		$this->root = $root;
		// var_dump($root);
		// exit;	
		array_push($this->queue,$root);
		while($this->queuePeek($this->queue)->left != null && $this->queuePeek($this->queue)->right != null){
			$node = array_shift($this->queue);
			array_push($this->queue,$node->left);
			array_push($this->queue,$node->right);
		}
	} 
	public function queuePeek($queue){
		return $queue[0];
	} 
	public function insert($val){
		$parent = $this->queuePeek($this->queue);
		$node = new Node($val);
		if($parent->left == null){
			$parent->left = $node;
		}else{
			$parent->right = $node;
			array_shift($this->queue);
			array_push($this->queue,$parent->left);
			array_push($this->queue,$parent->right);
		}
		return $parent->data;
	}
	public function getRoot(){
		return $this->root;
	}
}


$a = new Node(1);
$b = new Node(2);
$c = new Node(3);
$d = new Node(4);
$e = new Node(5);
$f = new Node(6);
$a->buildTree($b,$c);
$b->buildTree($d,$e);
$c->buildTree($f);

$GBTInserter = new GBTInserter($a);
$GBTInserter->insert(7);
$GBTInserter->insert(8);
$GBTInserter->insert(9);
$re = $GBTInserter->insert(10);
var_dump($re);