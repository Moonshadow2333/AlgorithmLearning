<?php

namespace Algorithm\UnionFind;

use Exception;

class UnionFind1 implements UF
{
    private array $id;
    public function __construct(int $size)
    {
        $this->id = range(0, $size - 1);
    }
    public function getSize(): int
    {
        return count($this->id);
    }

    // 查找元素 P 所对应的集合编号
    public function find(int $p)
    {
        if ($p < 0 || $p >= count($this->id)) {
            throw new Exception('p is out of bound');
        }
        return $this->id[$p];
    }

    // 查看元素 p 和 元素 q 是否所属一个集合
    public function isConected(int $p, int $q): bool
    {
        return $this->find($p) == $this->find($q);
    }

    // 合并元素 p 和 元素 q 所属的结合
    public function unionElements(int $p, int $q): void
    {
        $pId = $this->find($p);
        $qId = $this->find($q);
        if ($pId == $qId) {
            return;
        }

        for ($i = 0; $i < count($this->id); $i ++) {
            if ($this->id[$i] == $pId) {
                $this->id[$i] = $qId;
            }
        }
    }
}