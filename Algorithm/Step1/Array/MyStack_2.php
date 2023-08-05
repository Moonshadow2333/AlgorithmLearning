<?php

namespace Algorithm\DynamicArray;

class MyStack_2
{
    // 用单队列实现栈
    protected $queue;
    /**
    */
    public function __construct()
    {
        $this->queue = new PhpQueue();
    }

    /**
    * @param Integer $x
    * @return NULL
    */
    public function push($x)
    {
        $this->queue->enqueue($x);
        return null;
    }

    /**
    * @return Integer
    */
    public function pop()
    {
        if ($this->queue->isEmpty()) {
            throw new \Exception('Cannot pop from an empty stack!');
        }

        $size = $this->queue->size() - 1;
        for ($i = 0; $i < $size; $i++) {
            $this->queue->enqueue($this->queue->dequeue());
        }

        $peek = $this->queue->dequeue();
        return $peek;
    }

    /**
    * @return Integer
    */
    public function top()
    {
        $peek = $this->pop();
        $this->queue->enqueue($peek);
        return $peek;
    }

    /**
    * @return Boolean
    */
    public function empty()
    {
        return $this->queue->isEmpty();
    }
}
