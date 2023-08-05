<?php

namespace Algorithm\BST;

class BSTNode
{
    public $key;
    public $value;
    public $left;
    public $right;

    public function __construct($key, $val)
    {
        $this->key = $key;
        $this->value = $val;
        $this->left = NULL;
        $this->right = NULL;
    }
}