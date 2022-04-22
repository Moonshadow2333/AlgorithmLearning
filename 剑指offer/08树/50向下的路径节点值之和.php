<?php
include('./创建二叉树.php');
class Solution{
	public function pathSum(Node $root,$targetSum){
		$prefix = [
			0 => 1,
		];
		$curr = 0;
		return $this->dfs($root,$prefix,$curr,$targetSum);
	}
	public function dfs($root, $prefix, $curr, $targetSum){
		if($root == NULL){
			return 0;
		}
		$ret = 0;
		$curr += $root->data;
		$ret += $this->getOrDefault($prefix,$curr - $targetSum);
		$prefix[$curr] = $this->getOrDefault($prefix,$curr) + 1;
		$ret += $this->dfs($root->left,$prefix,$curr,$targetSum);
		$ret += $this->dfs($root->right,$prefix,$curr,$targetSum);
		$prefix[$curr] = $this->getOrDefault($prefix,$curr) - 1;
		return $ret;
	}

	public function getOrDefault($arr, $key, $default = 0){
		if(array_key_exists($key,$arr)){
			return $arr[$key];
		}else{
			return $default;
		}
	}
}

$a = new Node(5);
$b = new Node(2);
$c = new Node(4);
$d = new Node(1);
$e = new Node(6);
$f = new Node(3);
$g = new Node(7); 
$h = new Node(0);
$a->buildTree($b,$c);
$b->buildTree($d,$e);
$d->left = $h;
$obj = new Solution();
$re = $obj->pathSum($a,8);
var_dump($re);