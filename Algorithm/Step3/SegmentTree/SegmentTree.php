<?php

class SegmentTree
{
    private $data;
    private $tree;

    public function __construct($arr)
    {
        for ($i = 0; $i < count($arr); $i ++) {
            $this->data[$i] = $arr[$i];
        }
        $this->tree = array_fill(0, 4 * count($arr), 'null');
        $this->buildSegmentTree(0, 0, count($this->data) - 1);
    }

    // 在 treeIndex 的位置创建表示区间 [l,...,r] 的线段树
    public function buildSegmentTree($treeIndex, $l, $r)
    {
        if ($l == $r) {
            $this->tree[$treeIndex] = $this->data[$l];
            return;
        }

        $leftTreeIndex = $this->leftChild($treeIndex);
        $rightTreeIndex = $this->rightChild($treeIndex);

        $mid = floor(($l + $r) / 2);
        $this->buildSegmentTree($leftTreeIndex, $l, $mid);
        $this->buildSegmentTree($rightTreeIndex, $mid + 1, $r);
        $this->tree[$treeIndex] = $this->tree[$leftTreeIndex] + $this->tree[$rightTreeIndex];
    }

    public function query($queryL, $queryR)
    {
        if ($queryL < 0 || $queryL >= count($this->data) || $queryR < 0 || $queryR >= count($this->data) || $queryL > $queryR) {
            throw new Exception('Index is illegal');
        }
        return $this->implementsQuery(0, 0, count($this->data) - 1, $queryL, $queryR);
    }

    public function implementsQuery($treeIndex, $l, $r, $queryL, $queryR)
    {
        if ($l == $queryL && $r == $queryR) {
            return $this->tree[$treeIndex];
        }

        $mid = floor(($l + $r) / 2);
        $leftTreeIndex = $this->leftChild($treeIndex);
        $rightTreeIndex = $this->rightChild($treeIndex);

        if ($queryL >= $mid + 1) {
            return $this->implementsQuery($rightTreeIndex, $mid + 1, $r, $queryL, $queryR);
        } elseif ($queryR <= $mid) {
            return $this->implementsQuery($leftTreeIndex, $l, $mid, $queryL, $queryR);
        }

        $leftResult = $this->implementsQuery($leftTreeIndex, $l, $mid, $queryL, $mid);
        $rightResult = $this->implementsQuery($rightTreeIndex, $mid + 1, $r, $mid + 1, $queryR);
        return $leftResult + $rightResult;
    }

    public function set($index, $e)
    {
        if ($index < 0 || $index >= count($this->data)) {
            throw new Exception("Index is Illegal");
        }
        $this->data[$index] = $e;
        $this->implementsSet(0, 0, count($this->data) - 1, $index, $e);
    }

    public function implementsSet ($treeIndex, $l, $r, $index, $e)
    {
        if ($l == $r) {
            $this->tree[$treeIndex] = $e;
            return;
        }

        $mid = floor(($l + $r) / 2);
        $leftTreeIndex = $this->leftChild($treeIndex);
        $rightTreeIndex = $this->rightChild($treeIndex);
        if ($index <= $mid) {
            $this->implementsSet($leftTreeIndex, $l, $mid, $index, $e);
        } else {
            $this->implementsSet($rightTreeIndex, $mid + 1, $r, $index, $e);
        }
        $this->tree[$treeIndex] = $this->tree[$leftTreeIndex] + $this->tree[$rightTreeIndex];
    }

    public function get($index)
    {
        if ($index >= count($this->data) || $index < 0) {
            throw new Exception('illegal index');
        }
        return $this->data[$index];
    }

    public function getSize()
    {
        return count($this->data);
    }

    public function leftChild($index)
    {
        return 2 * $index + 1;
    }

    public function rightChild($index)
    {
        return 2 * $index + 2;
    }

    public function __toString()
    {
        return '['.trim(implode(', ', $this->tree), ', ').']';
    }
}


$arr = [-2, 0, 3, -5, 2, -1];
$segTree = new SegmentTree($arr);
// echo $segTree;

echo $segTree->query(0, 1).PHP_EOL;
$segTree->set(0,-3);
echo $segTree->query(0, 1);
// echo $segTree->query(2, 5);
// echo $segTree->query(0, 5);
