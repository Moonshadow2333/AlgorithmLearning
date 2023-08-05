<?php

namespace Algorithm\DynamicArray;

class MyStack
{
    protected $queue1;
    protected $queue2;
    /**
    */
    public function __construct()
    {
        $this->queue1 = new PhpQueue();
        $this->queue2 = new PhpQueue();
    }

    /**
    * @param Integer $x
    * @return NULL
    */
    public function push($x)
    {
        $this->queue1->enqueue($x);
        return NULL;
    }

    /**
    * @return Integer
    */
    public function pop()
    {
        if ($this->queue1->isEmpty()) {
            throw new \Exception('Cannot pop from an empty stack!');
        }

        $size = $this->queue1->size() - 1;
        for ($i = 0; $i < $size; $i++) {
            $this->queue2->enqueue($this->queue1->dequeue());
        }

        $peek = $this->queue1->dequeue();
        $temp = $this->queue1;
        $this->queue1 = $this->queue2;
        $this->queue2 = $temp;
        return $peek;
    }

    /**
    * @return Integer
    */
    public function top()
    {
        if ($this->queue1->isEmpty()) {
            throw new \Exception('Cannot top from an empty stack!');
        }
        $size = $this->queue1->size() - 1;
        for ($i = 0; $i < $size; $i++) {
            $this->queue2->enqueue($this->queue1->dequeue());
        }
        $peek = $this->queue1->dequeue();
        $this->queue2->enqueue($peek);
        $temp = $this->queue1;
        $this->queue1 = $this->queue2;
        $this->queue2 = $temp;
        return $peek;
    }

    /**
    * @return Boolean
    */
    public function empty()
    {
        return $this->queue1->isEmpty();
    }
}
