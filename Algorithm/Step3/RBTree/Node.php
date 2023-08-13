<?php

namespace Algorithm\RBTree;

class Node
{
    public $key;
    public $value;
    public $left;
    public $right;
    public $color;
    public const RED = true;
    public const BLACK = false;


    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;

        $this->left = null;
        $this->right = null;
        $this->color = self::RED;
    }
}
