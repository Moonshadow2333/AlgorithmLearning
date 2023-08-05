<?php

namespace Algorithm\Trie;

class Node
{
    public $isWord;
    public $next;

    public function __construct($isWord = false)
    {
        $this->isWord = $isWord;
        $this->next = [];
    }
}