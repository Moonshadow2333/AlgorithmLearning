<?php

class MapSum {
    /**
     * Initialize your data structure here.
     */
    private $root;
    function __construct() {
        $this->root = new Node();
    }

    /**
     * @param String $key
     * @param Integer $val
     * @return NULL
     */
    function insert($key, $val) {
        $cur = $this->root;
        for ($i = 0; $i < strlen($key); $i ++) {
            $char = $key[$i];
            if (empty($cur->next[$char])) {
                $cur->next[$char] = new Node();
            }
            $cur = $cur->next[$char];
        }

        // if (!$cur->isWord) {
            $cur->val = $val;
            $cur->isWord = true;
        // }
    }

    /**
     * @param String $prefix
     * @return Integer
     */
    function sum($prefix) {
        $cur = $this->root;
        for ($i = 0; $i < strlen($prefix); $i ++) {
            $char = $prefix[$i];
            if (empty($cur->next[$char])) {
                return 0;
            }
            $cur = $cur->next[$char];
        }
        // return true;
        // var_dump($cur);
        return $this->sumVal($cur);
    }

    public function sumVal($node)
    {
        if (empty($node->next)) {
            return $node->val;
        }

        $sum = $node->val;
        $children = array_keys($node->next);
        foreach ($children as $child) {
            $sum += $this->sumVal($node->next[$child]);
        }
        return $sum;
    }

    function getRoot()
    {
        return $this->root;
    }
}

class Node
{
    public $isWord;
    public $val;
    public $next;

    public function __construct($isWord = false)
    {
        $this->isWord = $isWord;
        $this->next = [];
        $this->val = 0;
    }
}

/**
 * Your MapSum object will be instantiated and called as such:
 * $obj = MapSum();
 * $obj->insert($key, $val);
 * $ret_2 = $obj->sum($prefix);
 * https://leetcode.cn/problems/z1R5dt/
 */

$obj = new MapSum();

// $obj->insert('apple', 3);
// $res = $obj->sum('ap');
// echo $res.PHP_EOL;
// $obj->insert('app', 2);
// $obj->insert('apple', 2);

// $ret_2 = $obj->sum('ap');
// echo $ret_2.PHP_EOL;

$obj->insert('aa', 3);
$res = $obj->sum('a');
echo $res.PHP_EOL;
$obj->insert('ab', 2);
// $obj->insert('apple', 2);

$ret_2 = $obj->sum('a');
echo $ret_2.PHP_EOL;

var_dump($obj->getRoot());