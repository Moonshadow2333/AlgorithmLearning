<?php

namespace Algorithm\Heap;

class PriorityQueue
{
    private $maxHeap;
    public function __construct()
    {
        $this->maxHeap = new MaxHeap();
    }

    public function getSize()
    {
        return $this->maxHeap->getSize();
    }

    public function isEmpty()
    {
        return $this->maxHeap->isEmpty();
    }

    public function getFront()
    {
        return $this->maxHeap->findMax();
    }

    public function enqueue($e)
    {
        $this->maxHeap->add($e);
    }

    public function dequeue()
    {
        return $this->maxHeap->extractMax();
    }
}