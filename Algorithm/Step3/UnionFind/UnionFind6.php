<?php

namespace Algorithm\UnionFind;

use Algorithm\UnionFind\UF;

class UnionFind6 implements UF
{
    private $parent;
    private $rank;
    public function __construct(int $size)
    {
        $this->parent = range(0, $size - 1);
        $this->rank = array_fill(0, $size - 1, 1);
    }

    public function getSize(): int
    {
        return count($this->parent);
    }

    private function find($p)
    {
        if ($p < 0 || $p >= $this->getSize()) {
            throw new \Exception('p is illegal index');
        }

        // 父节点指向孩子节点，根节点指向自己
        if ($p != $this->parent[$p]) {
            $this->parent[$p] = $this->find($this->parent[$p]);
        }
        return $this->parent[$p];
    }
    public function isConected(int $p, int $q): bool
    {
        return $this->find($p) == $this->find($q);
    }

    // 合并元素p和元素q所属的集合
    public function unionElements(int $p, int $q): void
    {
        $pRoot = $this->find($p);
        $qRoot = $this->find($q);
        if ($qRoot == $pRoot) {
            return ;
        }

        if ($this->rank[$pRoot] < $this->rank[$qRoot]) {
            $this->parent[$pRoot] = $qRoot;
        } elseif ($this->rank[$pRoot] > $this->rank[$qRoot]) {
            $this->parent[$qRoot] = $pRoot;
        } elseif ($this->rank[$pRoot] == $this->rank[$qRoot]) {
            $this->parent[$qRoot] = $pRoot;
            $this->rank[$pRoot] += 1;
        }
    }
}
