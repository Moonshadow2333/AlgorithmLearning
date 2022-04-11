<?php
include './创建二叉树.php';

class FindBottomLeftValue{
	public $queue1 = [];
	public $queue2 = [];
	public $bottomLeft;
	public function __construct(Node $root){
		array_push($this->queue1,$root);
		$this->bottomLeft = $root->data;
	}
	public function findBottomLeftValue(){
		while($this->queue1 != NULL){
			$node = array_shift($this->queue1);
			if($node->left != NULL){
				array_push($this->queue2,$node->left);
			}
			if($node->right != NULL){
				array_push($this->queue2,$node->right);
			}
			if(empty($this->queue1)){
				$this->queue1 = $this->queue2;
				$this->queue2 = [];
				if(!empty($this->queue1)){
					$this->bottomLeft = $this->queuePeek($this->queue1)->data;
				}
			}
		}
		return $this->bottomLeft;
	}
	public function queuePeek($queue){
		return $queue[0];
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
$c->buildTree($f);
$d->buildTree(NULL,$g);
$FindBottomLeftValue = new FindBottomLeftValue($a);
$re = $FindBottomLeftValue->findBottomLeftValue();
var_dump($re);