<?php

namespace Algorithm\BST;

class Node
{
    public $e;
    public $left;
    public $right;

    public function __construct($e)
    {
        $this->e = $e;
        $this->left = NULL;
        $this->right = NULL;
    }
}