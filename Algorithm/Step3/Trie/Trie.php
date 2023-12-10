<?php

namespace Algorithm\Trie;

class Trie
{
    private $root;
    private $size;

    public function __construct()
    {
        $this->root = new Node();
        $this->size = 0;
    }

    // 获得 trie 中存储的单词数量
    public function getSize()
    {
        return $this->size;
    }

    public function add($word)
    {
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
            $this->size++;
        }
    }

    // trie 中是否有 word
    public function contains($word)
    {
        $cur = $this->root;
        for ($i = 0; $i < strlen($word); $i ++) {
            $char = $word[$i];
            if (empty($cur->next[$char])) {
                return false;
            }
            $cur = $cur->next[$char];
        }
        return $cur->isWord;
    }

    // 查询是否在 trie 中有单词以 prefix 为前缀
    public function isPrefix($prefix)
    {
        $cur = $this->root;
        for ($i = 0; $i < strlen($prefix); $i ++) {
            $char = $prefix[$i];
            if (empty($cur->next[$char])) {
                return false;
            }
            $cur = $cur->next[$char];
        }
        return true;
    }

    public static function main()
    {
        $word = 'hello';
        $word1 = 'hi';
        $word2 = 'help';
        $trie = (new Trie());
        $trie->add($word);
        $trie->add($word1);
        echo $trie->getSize().PHP_EOL;
        // var_dump($trie->root);
        var_dump($trie->contains('hii'));
        var_dump($trie->isPrefix('hel'));
    }
}
