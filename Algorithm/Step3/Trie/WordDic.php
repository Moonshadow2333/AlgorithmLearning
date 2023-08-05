<?php

class WordDictionary {
    /**
     */
    private $root;
    function __construct() {
        $this->root = new Node();
    }

    /**
     * @param String $word
     * @return NULL
     */
    function addWord($word) {
        $cur = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];
            if (empty($cur->next[$char])) {
                $cur->next[$char] = new Node();
            } 
            $cur = $cur->next[$char];
        }

        if (!$cur->isWord) {
            $cur->isWord = true;
        }
    }

    /**
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        return $this->match($this->root, $word, 0);
    }

    function match($node, $word, $index)
    {
        if ($index == strlen($word)) {
            // echo '2333'.PHP_EOL;
            return $node->isWord;
        }

        $char = $word[$index];
        if ($char != '.') {
            // $this->match();
            if (empty($node->next[$char])) {
                return false;
            }
            return $this->match($node->next[$char], $word, $index + 1);
        } else {
            $children = array_keys($node->next);
            for ($i = 0; $i < count($children); $i ++) {
                if ($this->match($node->next[$children[$i]], $word, $index + 1)) {
                    return true;
                }
            }
            return false;
        }
    }

    function getRoot()
    {
        return $this->root;
    }
}

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

/**
 * Your WordDictionary object will be instantiated and called as such:
 * $obj = WordDictionary();
 * $obj->addWord($word);
 * $ret_2 = $obj->search($word);
 * https://leetcode.cn/problems/design-add-and-search-words-data-structure/
 */

$obj = new WordDictionary();
$obj->addWord('bad');
$obj->addWord('dad');
$obj->addWord('mad');
var_dump($obj->getRoot());
$ret_2 = $obj->search('.');
var_dump($ret_2);