<?php
include './创建二叉树.php';

class LargestValues{
	public $current = 0;
	public $next    = 0;
	public $queue   = [];
	public $result  = [];
	public $max     = -10000;
	public function __construct(Node $root){
		if($root != NULL){
			array_push($this->queue,$root);
			$this->current = 1;
		}
	}
	public function largestValues(){
		while(!empty($this->queue)){
			$node = array_shift($this->queue);
			$this->current--;
			$max  = max($node->data,$this->max);
			if($node->left != NULL){
				array_push($this->queue,$node->left);
				$this->next++;
			} 
			if($node->right != NULL){
				array_push($this->queue,$node->right);
				$this->next++;
			}
			if($this->current == 0){
				$this->result[] = $max;
				$max = $this->max;
				$this->current = $this->next;
				$this->next = 0; 
			}
		}
		return $this->result;
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
$c->buildTree($f,$g);


$LargestValues = new LargestValues($a);
$re = $LargestValues->LargestValues();
var_dump($re);