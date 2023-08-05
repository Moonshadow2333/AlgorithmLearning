<?php

namespace Algorithm\AVL;

class AvlSet implements Set
{
    private $avl;
    public function __construct()
    {
        $this->avl = new AVLTree();
    }

    public function add($e): void
    {
        $this->avl->add($e, null);
    }

    public function remove($e): void
    {
        $this->avl->remove($e);
    }

    public function contains($e): bool
    {
        return $this->avl->contains($e);
    }

    public function getSize(): int
    {
        return $this->avl->getSize();
    }

    public function isEmpty(): bool
    {
        return $this->avl->isEmpty();
    }

    public static function Main()
    {
        $set = new AvlSet();
        $words = ['a', 'b', 'c', 'a', 'sdfds', 'a', 'aaa', 'sdrfsd', 'a', 'sdfwer', 'b'];
        foreach ($words as $word) {
            {
                $set->add($word);
            }
        }
        echo sprintf('total different words: %d', $set->getSize()).PHP_EOL;


        // var_dump($map->isBst());exit;
        // var_dump($map->isBalanced());
        echo 'Success';
    }
}