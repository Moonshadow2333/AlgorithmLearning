<?php

namespace Algorithm\Heap;

use Algorithm\DynamicArray\DynamicArray;

class MaxHeap
{
    public $data;
    public function __construct()
    {
        $this->data = new DynamicArray();
    }

    public function getSize()
    {
        // return count($this->data);
        return $this->data->getSize();
    }

    public function isEmpty()
    {
        return $this->data->isEmpty();
        // return empty($this->data);
    }

    // 一个索引所表示的元素父亲节点的索引
    public function parent($index)
    {
        if ($index == 0) {
            throw new \Exception("index-0 doesn't have parent.");
        }

        return ($index - 1) / 2;
    }

    public function leftChild($index)
    {
        return $index * 2 + 1;
    }

    public function rightChild($index)
    {
        return $index * 2 + 2;
    }

    public function add($e)
    {
        $this->data->addLast($e);
        $this->siftUp($this->getSize() - 1);
    }

    protected function siftUp($k)
    {
        while ($k > 0 && $this->data->get($this->parent($k)) < $this->data->get($k)) {
            $this->data->swap($k, $this->parent($k));
            $k = $this->parent($k);
        }
    }

    // 堆中最大的元素
    public function findMax()
    {
        if ($this->getSize() == 0) {
            throw new \Exception('Cannot findMax when heap is empty');
        }

        return $this->data->get(0);
    }

    // 取出堆中最大元素
    public function extractMax()
    {
        $res = $this->findMax();
        $this->data->swap(0, $this->getSize() - 1);
        $this->data->removeLast();
        $this->siftDown(0);
        return $res;
    }

    protected function siftDown($k)
    {
        while ($this->leftChild($k) < $this->getSize()) {
            $j = $this->leftChild($k);
            if ($j + 1 < $this->getSize() && $this->data->get($j + 1) > $this->data->get($j)) {
                $j = $this->rightChild($k);
            }
            // $data[$j] 是 leftChild 和 rightChild 中的最大值

            if ($this->data->get($k) >= $this->data->get($j)) {
                break;
            }

            $this->data->swap($k, $j);
            $k = $j;
        }
    }

    public function heapify($arr)
    {
        $this->data->setArray($arr);
        for ($i = $this->parent($this->getSize() - 1); $i >= 0; $i--) {
            $this->siftDown($i);
        }
    }
}