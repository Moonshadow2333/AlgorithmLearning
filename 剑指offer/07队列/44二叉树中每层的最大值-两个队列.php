<?php
include './创建二叉树.php';

class LargestValues{
	public $queue1 = [];
	public $queue2 = [];
	public $max    = -10000;  
	public $result = [];
	public function __construct(Node $root){
		if(!is_null($root)){
			array_push($this->queue1,$root);
		}
	} 
	public function largestValues(){
		while($this->queue1 != NULL){
			$node = array_shift($this->queue1);
			$max  = max($node->data,$this->max);
			if(!is_null($node->left)){
				array_push($this->queue2,$node->left);
			}
			if(!is_null($node->right)){
				array_push($this->queue2,$node->right);
			}
			if(empty($this->queue1)){
				$this->result[] = $max;
				$max = $this->max;
				$this->queue1 = $this->queue2;
				$this->queue2 = [];
			}
			// $i++;
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