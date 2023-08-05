<?php

namespace Algorithm\AVL;

class Node
{
    public $key;
    public $value;
    public $left;
    public $right;
    public $height;

    public function __construct($key, $val)
    {
        $this->key = $key;
        $this->value = $val;
        $this->left = null;
        $this->right = null;
        $this->height = 1;
    }
}
