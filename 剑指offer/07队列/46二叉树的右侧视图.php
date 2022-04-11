<?php
include './创建二叉树.php';

class RightSideView{
	public $queue1 = [];
	public $queue2 = [];
	public $view   = [];
	public function __construct(Node $root){
		if($root == NULL){
			return $this->view;
		}
		array_push($this->queue1,$root);
	}
	public function rightSideView(){
		while($this->queue1 != NULL){
			$node = array_shift($this->queue1);
			if($node->left != NULL){
				array_push($this->queue2,$node->left); 
			}
			if($node->right != NULL){
				array_push($this->queue2,$node->right);
			}
			if(empty($this->queue1)){
				$this->view[] = $node->data;
				$this->queue1 = $this->queue2;
				$this->queue2 = [];
			}
		}
		return $this->view;
	} 
}


$a = new Node(1);
$b = new Node(2);
$c = new Node(3);
$d = new Node(4);
$e = new Node(5);
$f = new Node(6);
$g = new Node(8);
$a->buildTree($b,$c);
$b->buildTree($d,$e);
// $c->buildTree($f);
// $d->buildTree(NULL,$g);

$rightSideView = new RightSideView($a);
$re = $rightSideView->rightSideView();
var_dump($re);
